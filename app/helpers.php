<?php
declare(strict_types= 1);

if(!function_exists('image_url') || !function_exists('image_url_cafes') || !function_exists('image_url_profiles')){
    function image_url(string $path): string
    {
        if(app()->environment('production')){
            return (string) app()->make(\Cloudinary\Cloudinary::class)->image($path)->secure();
        }
        return asset('storage/posts/' . $path);
    }

    function image_url_cafes(string $path): string
    {
        if(app()->environment('production')){
            return (string) app()->make(\Cloudinary\Cloudinary::class)->image($path)->secure();
        }
        return asset('storage/' . $path);
    }

    function image_url_profiles(string $path): string
    {
        if(app()->environment('production')){
            return (string) app()->make(\Cloudinary\Cloudinary::class)->image($path)->secure();
        }
        return asset('storage/' . $path);
    }
}