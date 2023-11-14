<?php
declare(strict_types= 1);

namespace App\Modules\ImageUpload;

interface ImageManagerInterface
{
    /**
     * @param \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string $file
     * @return string
     */
    public function save($file): String;

    public function delete(String $name): void;

    public function saveCafe($file): String;

    public function deleteCafe(String $name): void;

    public function saveProfile($file): String;

    public function deleteProfile(String $name):void;

}