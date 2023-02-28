<?php


namespace App\Helper;


use Illuminate\Support\Str;

class Helper
{
    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;

    public static function uploadImage ($image, $directory, $modelImage = null)
    {
        if ($image)
        {
            if (isset($modelImage))
            {
                if (file_exists($modelImage))
                {
                    unlink($modelImage);
                }
            }
            self::$imageName = Str::random(10).'.'.$image->getClientOriginalExtension();
            $image->move($directory, self::$imageName);
            self::$imageUrl = $directory.self::$imageName;
        }
        else {
            self::$imageUrl = $modelImage;
        }

        return self::$imageUrl;
    }
}
