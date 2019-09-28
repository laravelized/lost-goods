<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 8:24
 */

namespace App\Services\Uploader;


class UploadResult
{
    private $url;
    private $path;

    public function __construct(string $url, string $path)
    {
        $this->url = $url;
        $this->path = $path;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}