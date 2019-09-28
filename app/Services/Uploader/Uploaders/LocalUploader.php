<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 8:26
 */

namespace App\Services\Uploader\Uploaders;

use App\Services\Uploader\UploaderInterface;
use App\Services\Uploader\UploadResult;
use Illuminate\Support\Facades\Storage;

class LocalUploader implements UploaderInterface
{
    private $rootUrl;

    public function __construct(string $rootUrl)
    {
        $this->rootUrl = $rootUrl;
    }

    public function upload(string $data, string $name, string $path = ''): UploadResult
    {
        if ($path === '') {
            $fullPath = "public/{$name}";
        } else {
            $fullPath = "public/{$path}/{$name}";
        }

        Storage::disk('local')->put($fullPath, $data);
        $publicPath = Storage::disk('local')->url($fullPath);

        $fullUrl = "{$this->rootUrl}{$publicPath}";

        return new UploadResult($fullUrl, $fullPath);
    }

    public function delete(string $pathAndName): void
    {
        Storage::disk('local')
            ->delete($pathAndName);
    }
}
