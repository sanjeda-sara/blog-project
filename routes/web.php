<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Front\PageController;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/change-img-path', function (){
//    $blogs = \App\Models\Service::all();
//    foreach ($blogs as $key =>$blog)
//    {
//        $blog->service_image = 'assets/images/service-images/'.$key.'.png';
//        $blog->save();
//    }
//    return 'success';
    return Str::random(8);
});
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact-page');
Route::get('/services', [PageController::class, 'service'])->name('service-page');
Route::get('/blog-details/{id}', [PageController::class, 'blogDetails'])->name('blog-details');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function (){
    Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::post('/new-category', [CategoryController::class, 'newCategory'])->name('new-category');
    Route::get('/manage-category', [CategoryController::class, 'manageCategory'])->name('manage-category');

    Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('add-blog');
    Route::post('/new-blog', [BlogController::class, 'newBlog'])->name('new-blog');
    Route::get('/manage-blog', [BlogController::class, 'manageBlog'])->name('manage-blog');
    Route::get('/edit-blog/{id}/{title}', [BlogController::class, 'editBlog'])->name('edit-blog');
    Route::post('/update-blog/{id}', [BlogController::class, 'updateBlog'])->name('update-blog');
    Route::post('/delete-blog/{id}', [BlogController::class, 'deleteBlog'])->name('delete-blog');

});
