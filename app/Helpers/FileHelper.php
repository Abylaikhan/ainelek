<?php


namespace App\Helpers;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileHelper
{
    /**
     * @param $url
     * @return string
     */
    public static function getFile($url): string
    {
        return $url ? env('FILES_URL') . Storage::url($url) : '';
    }

    public static function save($file, $path, $width = null, $height = null)
    {
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $imageName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . Str::lower(Str::random(3))) . '.' . $file->extension();

        if ($width && $height) {
            $image     = Image::make($file);
            $imagePath = storage_path("app/$path");
            $image->fit($width, $height)->save("$imagePath/$imageName");
            return "$path/$imageName";
        } else {
            return $file->storePubliclyAs($path, $imageName);
        }
    }
}
