<?php

namespace App\Http\Controllers\Admin\Dashboard\Lostgood;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Services\LostGoodImageService\LostGoodImageServiceInterface;
use App\Services\Session\NotificationKeys;
use App\Services\StringService\StringServiceInterface;
use App\Services\Uploader\UploaderInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class UpdateLostHandler extends Controller
{
    private $uploader;
    private $stringService;
    private $lostGoodImageService;
    private $application;

    public function __construct(
        UploaderInterface $uploader,
        StringServiceInterface $stringService,
        LostGoodImageServiceInterface $lostGoodImageService,
        Application $application
    )
    {
        $this->application = $application;
        $this->uploader = $uploader;
        $this->stringService = $stringService;
        $this->lostGoodImageService = $lostGoodImageService;
    }

    public function __invoke(Request $request, $lostGoodId)
    {
        $request->validate([
            'good_name' => [
                'required',
                'max:191'
            ],
            'category' => [
                'required'
            ],
            'lost_place' => [
                'required',
                'max:191'
            ],
            'lost_date' => [
                'required',
                'date'
            ],
            'information_details' => [
                'required',
                'max:1000'
            ],
            'mobile_number' => [
                'required',
                'max:191'
            ]
        ]);

        $lostGood = LostGood::where('id', $lostGoodId)->firstOrFail();
        $params = $request->input();

        $lostGood->update([
            'name' => $params['good_name'],
            'place_details' => $params['lost_place'],
            'date' => $params['lost_date'],
            'mobile_number' => $params['mobile_number'],
            'information' => $params['information_details']
        ]);

        $category = Category::where('name', $params['category'])->first();
        $lostGood->categories()->sync([$category->id]);

        if ($request->hasFile('image')) {

            if ($lostGood->lostGoodImages->count()) {
                $imagesToBeDeleted = $lostGood->lostGoodImages;
                foreach ($imagesToBeDeleted as $imageToBeDeleted) {
                    $uploader = $this->application->make($imageToBeDeleted->uploader_class);
                    $uploader->delete($imageToBeDeleted->path);
                    $imageToBeDeleted->delete();
                }
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

            $lostGood = $lostGood->refresh();

        }

        return redirect()
            ->back()
            ->with(NotificationKeys::SUCCESS, __('messages.notifications.lost_updated'));
    }
}
