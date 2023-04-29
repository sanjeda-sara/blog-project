<?php


namespace App\helper;


class CustomHelper
{

    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    public static function imageUpload ($image, $directory, $existUrl=null)
    {
        if ($image)
        {
            if (file_exists($existUrl))
            {
                unlink($existUrl);
            }
            self::$imageName = time().rand(10, 10000).'.'.$image->getClientOriginalExtension();
            $image->move($directory, self::$imageName);
            return $directory.self::$imageName;
        } else {
            return $existUrl;
        }

    }
}
