<?php


namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\LostGoodImage;
use App\Services\Session\NotificationKeys;
use App\Services\StringService\StringServiceInterface;
use App\Services\Uploader\UploaderInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class UpdateFoundHandler extends Controller
{
    private $uploader;
    private $stringService;
    private $application;

    public function __construct(
        UploaderInterface $uploader,
        StringServiceInterface $stringService,
        Application $application
    )
    {
        $this->application = $application;
        $this->uploader = $uploader;
        $this->stringService = $stringService;
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
            'place_of_found' => [
                'required',
                'max:191'
            ],
            'date_of_found' => [
                'required',
                'date'
            ],
            'mobile_number' => [
                'required'
            ]
        ]);

        try {
            $lostGood = LostGood
                ::with(['lostGoodImages'])
                ->where('id', $lostGoodId)
                ->first();

            $lostGood->update([
                'name' => $request->input('good_name'),
                'place_details' => $request->input('place_of_found'),
                'date' => $request->input('date_of_found'),
                'mobile_number' => $request->input('mobile_number')
            ]);

            $category = Category::where('name', $request->input('category'))->first();
            $lostGood->categories()->sync([$category->id]);

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

            return back()
                ->with(NotificationKeys::SUCCESS, __('messages.notifications.found_post_updated'));

        } catch (\Exception $exception) {
            return back()
                ->with(NotificationKeys::EXCEPTION, $exception->getMessage());
        }

    }
}
