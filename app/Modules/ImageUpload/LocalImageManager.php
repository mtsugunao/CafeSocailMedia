<?php
declare(strict_types= 1);

namespace App\Modules\ImageUpload;

use Illuminate\Support\Facades\Storage;

class LocalImageManager implements ImageManagerInterface
{
    public function save($file): string
    {
        $path = (string) Storage::putFile('public/posts', $file);
        $array = (array) explode("/", $path);
        return end($array);
    }

    public function delete(string $name): void
    {
        $filePath = 'public/posts/' . $name;
        if(Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }

    public function saveCafe($file): string
    {
        $path = (string) Storage::disk('public')->putFile('cafes', $file);
        return $path;
    }

    public function deleteCafe(string $name): void
    {
        $filePath = 'public/' . $name;
        if(Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }

    public function saveProfile($file): string 
    {
        $path = (string) Storage::disk('public')->putFile('profile-icons', $file);
        return $path;
    }

    public function deleteProfile(string $name): void
    {
        $filePath = 'public/' . $name;
        if(Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }

}