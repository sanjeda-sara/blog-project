<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static $category;
    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;

    public static function saveCategory ($request)
    {
//        if ($request->file('category_image'))
//        {
//            self::$imageUrl = self::uploadImage($request);
//        } else {
//            self::$imageUrl = '';
//        }
        self::$category = new Category();
        self::$category->category_name  = $request->category_name;
        self::$category->category_image  = self::uploadImage($request);
        self::$category->status         = $request->status;
        self::$category->save();
    }

    public static function uploadImage($request)
    {
        self::$image = $request->file('category_image');
        self::$imageName = time().rand(10, 1000).'.'.self::$image->getClientOriginalExtension();
        self::$imageDirectory = 'assets/images/category/';
        self::$image->move(self::$imageDirectory, self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }
}
