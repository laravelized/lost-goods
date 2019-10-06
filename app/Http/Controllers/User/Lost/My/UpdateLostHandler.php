<?php

namespace App\Http\Controllers\User\Lost\My;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\LostGoodImage;
use App\Services\Session\NotificationKeys;
use App\Services\StringService\StringServiceInterface;
use App\Services\Uploader\UploaderInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class UpdateLostHandler extends Controller
{
    private $uploader;
    private $application;
    private $stringService;

    public function __construct(
        UploaderInterface $uploader,
        Application $application,
        StringServiceInterface $stringService
    )
    {
        $this->stringService = $stringService;
        $this->uploader = $uploader;
        $this->application = $application;
    }

    public function __invoke(Request $request, $lostGoodId)
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
            $category = Category::where('name', $request->input('category'))->first();
            if (is_null($category)) {

            }

            $lostGood = LostGood::where('id', $lostGoodId)->first();
            if (is_null($lostGood)) {

            }

            $lostGood->update([
                'name' => $request->input('good_name'),
                'information' => $request->input('information_details'),
                'place_details' => $request->input('place_of_lost'),
                'date' => $request->input('date_of_lost'),
                'mobile_number' => $request->input('mobile_number'),
            ]);

            $lostGood->categories()->sync([$category->id]);

        } catch (\Exception $exception) {
            abort(500);
        }

        try {

            if ($request->hasFile('image')) {
                $lostGoodImages = $lostGood->lostGoodImages;

                if ($lostGoodImages->count()) {
                    $lostGoodImage = $lostGoodImages[0];
                    $uploader = $this->application->make($lostGoodImage->uploader_class);
                    $uploader->delete($lostGoodImage->path);
                    $lostGoodImage->delete();
                }

                $file = $request->file('image');
                $stringRepresentedFile = $file
                    ->openFile()
                    ->fRead($file->getSize());
                $extension = $file->getClientOriginalExtension();
                $randomString = $this->stringService->getRandomString(40);
                $fileName = "{$randomString}.{$extension}";
                $fileDoExist = true;
                while ($fileDoExist) {
                    $lostGoodImageWithSameName = LostGoodImage::where('file_name', $fileName)->first();
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

        } catch (\Exception $exception) {

        }

        return back()
            ->with(NotificationKeys::SUCCESS, 'Pengumumuman kehilangan telah diubah');
    }
}
