<?php

namespace App\Models;

use App\helper\Customhelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

//    protected $guarded=[];

    protected static $service;
    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;


    public static function saveData($request){

        $image=$request->file('service_image');
//        self::$imageName=time().rand(10,2000).'.'.self::$image->getClientOriginalExtension();
        $imageDirectory='admin/assets/service-images/';
//        self::$image->move(self::$imageDirectory,self::$imageName);
//        self::$imageUrl=self::$imageDirectory.self::$imageName;

        self::$service=new Service();
        self::$service->service_title              =$request->service_title;
        self::$service->service_image              =Customhelper::imageUpload($image,$imageDirectory);
        self::$service->service_content            =$request->service_content;
        self::$service->status                     =$request->status;
        self::$service->save();

    }

    public static function updateData($request){
        self::$service=Service::findOrFail($request->service_id);

        $image=$request->file('service_image');
        $filename=self::$service->service_image;
        $imageDirectory='admin/assets/servis-images/';

//        if (self::$image)
//        {
//            if (file_exists(self::$service->category_image))
//            {
//                unlink(self::$service->category_image);
//            }
//            self::$imageName=time().rand(10,2000).'.'.self::$image->getClientOriginalExtension();
//            self::$imageDirectory='admin/assets/cat-images/';
//            self::$image->move(self::$imageDirectory,self::$imageName);
//            self::$imageUrl=self::$imageDirectory.self::$imageName;
//
//        }
//        else
//        {
//            self::$imageUrl=self::$service->category_image;
//        }


        self::$service->service_title              =$request->service_title;
        self::$service->service_image              =Customhelper::updateimage($image,$filename,$imageDirectory);
        self::$service->service_content            =$request->service_content;
        self::$service->status                     =$request->status;
        self::$service ->save();

    }




}
