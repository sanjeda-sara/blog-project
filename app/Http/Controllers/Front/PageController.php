<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home ()
    {
        return view('front.home.home',[
            'blogs'     => Blog::where('status', 1)->take(3)->latest()->get(),
            'services'  => Service::where('status', 1)->take(3)->skip(2)->get(),
        ]);
    }

    public function contact ()
    {
        return view('front.contact.contact');
    }

    public function service ()
    {
        return view('front.service.service');
    }
    public function blogDetails ($id)
    {
        return view('front.blog.details',[
            'blog'  => Blog::find($id),
        ]);
    }
}
