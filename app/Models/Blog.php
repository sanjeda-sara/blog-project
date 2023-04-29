<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\DefaultController;
use App\helper\CustomHelper;
use Laravel\Sanctum\PersonalAccessToken;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static $blog;

    public static function createBlog($request)
    {
        self::$blog = new Blog();
        self::$blog->category_id    = $request->category_id;
        self::$blog->blog_title     = $request->blog_title;
        self::$blog->blog_image     = CustomHelper::imageUpload($request->file('blog_image'),'assets/images/blog/');
        self::$blog->blog_content   = $request->blog_content;
        self::$blog->status         = $request->status;
        self::$blog->save();
    }

    public static function updateBlog ($request, $blogId)
    {
        self::$blog = Blog::find($blogId);
        self::$blog->category_id    = $request->category_id;
        self::$blog->blog_title     = $request->blog_title;
        self::$blog->blog_image     = CustomHelper::imageUpload($request->file('blog_image'),'assets/images/blog/', self::$blog->blog_image);
        self::$blog->blog_content   = $request->blog_content;
        self::$blog->status         = $request->status;
        self::$blog->save();
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

}
