<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 8:21
 */

namespace App\Services\Uploader;

interface UploaderInterface
{
    public function upload(string $data, string $name, string $path = ''): UploadResult;

    public function delete(string $pathAndName): void;
}
