<?php

namespace App\Http\Controllers\Admin\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeAdminProfileRequest;
use App\Modules\User\Models\User;
use App\Services\Session\NotificationKeys;
use App\Services\StringService\StringServiceInterface;
use App\Services\Uploader\UploaderInterface;
use Illuminate\Support\Facades\Hash;

class ChangeProfileHandler extends Controller
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

    public function __invoke(ChangeAdminProfileRequest $request)
    {
        $user = $request->user();
        $params = $request->input();

        $user->update([
            'username' => $params['username'],
            'full_name' => $params['full_name'],
            'email' => $params['email'],
            'mobile_number' => $params['mobile_number'],
            'address' => $params['address']
        ]);

        if (isset($params['password'])) {
            $user->update([
                'password' => Hash::make($params['password'])
            ]);
        }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $stringRepresentedFile = $file
                ->openFile()
                ->fRead($file->getSize());
            $extension = $file->getClientOriginalExtension();
            $randomString = $this->stringService->getRandomString(40);
            $fileName = "{$randomString}.{$extension}";
            $userDoExist = true;
            while ($userDoExist) {
                $anotherUserWithSamePictureName = User
                    ::where('profile_picture_file_name', $fileName)
                    ->first();

                if (is_null($anotherUserWithSamePictureName)) {
                    $userDoExist = false;
                } else {
                    $randomString = $this->stringService->getRandomString(40);
                    $fileName = "{$randomString}.{$extension}";
                }
            }

            $uploadResult = $this->uploader
                ->upload($stringRepresentedFile, $fileName, 'profile-pictures');

            $user->update([
                'profile_picture_uploader_class' => get_class($this->uploader),
                'profile_picture_file_name' => $fileName,
                'profile_picture_path' => $uploadResult->getPath(),
                'profile_picture_url' => $uploadResult->getUrl()
            ]);
        }

        return redirect()
            ->back()
            ->with(NotificationKeys::SUCCESS, __('messages.notifications.admin_profile_updated'));
    }
}
