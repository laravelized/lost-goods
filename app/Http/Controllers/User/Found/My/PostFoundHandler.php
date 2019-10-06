<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 26/09/19
 * Time: 20:24
 */

namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Services\LostGoodImageService\LostGoodImageServiceInterface;
use App\Modules\LostGoods\Services\LostGoodService\LostGoodServiceInterface;
use App\Services\Session\NotificationKeys;
use App\Services\StringService\StringServiceInterface;
use App\Services\Uploader\UploaderInterface;
use Illuminate\Http\Request;

class PostFoundHandler extends Controller
{
    private $lostGoodService;
    private $lostGoodImageService;
    private $uploader;
    private $stringService;

    public function __construct(
        LostGoodServiceInterface $lostGoodService,
        LostGoodImageServiceInterface $lostGoodImageService,
        UploaderInterface $uploader,
        StringServiceInterface $stringService
    )
    {
        $this->stringService = $stringService;
        $this->uploader = $uploader;
        $this->lostGoodImageService = $lostGoodImageService;
        $this->lostGoodService = $lostGoodService;
    }

    public function __invoke(Request $request)
    {
        try {
            $user = $request->user();

            $lostGood = $this->lostGoodService->createFound([
                'user_id' => $user->id,
                'name' => $request->input('name'),
                'information' => $request->input('information'),
                'type' => LostGoodTypeEnum::FOUND,
                'place_details' => $request->input('place_of_found'),
                'date' => $request->input('date_of_found'),
                'mobile_number' => $request->input('mobile_number')
            ]);

            $categoryName = $request->input('category');
            $category = Category::where('name', $categoryName)->first();
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
                    $lostGoodImageWithSameName = $this->lostGoodImageService->getByFileName($fileName);
                    if (is_null($lostGoodImageWithSameName)) {
                        $fileDoExist = false;
                    } else {
                        $randomString = $this->stringService->getRandomString(40);
                        $fileName = "{$randomString}.{$extension}";
                    }
                }

                $uploadResult = $this->uploader
                    ->upload($stringRepresentedFile, $fileName, 'lost-goods-images');

                $this->lostGoodImageService->create([
                    'lost_good_id' => $lostGood->id,
                    'url' => $uploadResult->getUrl(),
                    'path' => $uploadResult->getPath(),
                    'file_name' => $fileName,
                    'uploader_class' => get_class($this->uploader)
                ]);
            }

            $request->session()->put('just_created_lost_good_id', $lostGood->id);
            return back()
                ->with(NotificationKeys::SUCCESS, 'Pengumuman penemuan barang telah terbuat');

        } catch (\Exception $exception) {

            return back()
                ->with(NotificationKeys::EXCEPTION, $exception->getMessage());
        }
    }
}
