<?php

namespace App\Http\Controllers\User\Lost\My;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLostRequest;
use App\Modules\Category\Exceptions\CategoryDoesNotExistException;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\LostGoodImage;
use App\Services\Session\NotificationKeys;
use App\Services\StringService\StringServiceInterface;
use App\Services\Uploader\UploaderInterface;
use Illuminate\Http\Request;

class PostLostHandler extends Controller
{
    private $uploader;
    private $stringService;

    public function __construct(
        UploaderInterface $uploader,
        StringServiceInterface $stringService
    )
    {
        $this->uploader = $uploader;
        $this->stringService = $stringService;
    }

    public function __invoke(CreateLostRequest $request)
    {
        $request->validate([
            'good_name' => [
                'required',
                'max:191'
            ],
            'information_details' =>[
                'required',
                'max:100'
            ],
            'category' => [
                'required'
            ],
            'place_of_lost' => [
                'required',
                'max:191'
            ],
            'date_of_lost' => [
                'required',
                'date'
            ],
            'mobile_number' => [
                'required'
            ]
        ]);

        try {
            $user = $request->user();

            $categoryId = $request->input('category');
            $category = Category::where('name', $categoryId)->first();

            if (is_null($category)) {
                throw new CategoryDoesNotExistException(CategoryDoesNotExistException::MESSAGE_KEY);
            }

            $lostGood = LostGood::create([
                'type' => LostGoodTypeEnum::LOST,
                'name' => $request->input('good_name'),
                'information' => $request->input('information_details'),
                'place_details' => $request->input('place_of_lost'),
                'date' => $request->input('date_of_lost'),
                'mobile_number' => $request->input('mobile_number'),
                'user_id' => $user->id
            ]);

            $lostGood->categories()->sync([$category->id]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $stringRepresentedFile = $file
                    ->openFile()
                    ->fRead($file->getSize());
                $extension = $file->getClientOriginalExtension();
                $randomString = $this->stringService->getRandomString(40);
                $fileName = "{$randomString}.{$extension}";
                $fileDoExist = true;
                while ($fileDoExist) {
                    $lostGoodImageWithSameName = LostGoodImage
                        ::where('file_name', $fileName)
                        ->first();

                    if (is_null($lostGoodImageWithSameName)) {
                        $fileDoExist = false;
                    } else {
                        $randomString = $this->stringService->getRandomString(40);
                        $fileName = "{$randomString}.{$extension}";
                    }
                }

                $uploadResult = $this->uploader
                    ->upload($stringRepresentedFile, $fileName, 'lost-goods-images');

                LostGoodImage::create([
                    'lost_good_id' => $lostGood->id,
                    'url' => $uploadResult->getUrl(),
                    'path' => $uploadResult->getPath(),
                    'file_name' => $fileName,
                    'uploader_class' => get_class($this->uploader)
                ]);
            }

            return redirect()
                ->route('user.lost.my.list')
                ->with(NotificationKeys::SUCCESS, 'Pengumuman barang hilang telah terpasang');

        } catch (\Exception $exception) {

            return redirect()
                ->back()
                ->with(NotificationKeys::EXCEPTION, $exception->getMessage());
        }
    }
}
