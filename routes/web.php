<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as NewsAdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryAdminController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::view('/laravel','laravel')->name('laravel');

Route::get('/name/{name}', function ($name) {
    include "../resources/views/menu.php";
    return "Welcome, {$name}!";
})->name('name');

Route::get('/name', function () {
    include "../resources/views/menu.blade.php";
    return "Enter Name..";
})->name('noname');

Route::view('/about', 'about')->name('about');

//Route::get('/news', [NewsController::class, 'index'])->name('newsfeed');
//Route::get('/news/{id}', [NewsController::class, 'show'])
//->where('id', '[0-9]+')
//->name('newspage');

Route::group(['prefix'=>'news', 'as'=>'news.'], function () {
    Route::get('/', [NewsController::class, 'index'])->name('newsfeed');
    Route::get('/{id}', [NewsController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('newspage');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/cats', [CategoryController::class, 'cats'])->name('cats');
    Route::get('/category/{id}', [CategoryController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('catpage');
    Route::get('/category/{id}/list', [NewsController::class, 'list'])
    ->where('id', '[0-9]+')
    ->name('catlist');
    Route::get('/category/{opt}/{id}', [CategoryController::class, 'catby'])
//    ->where('opt', '\w+[0-9_]+')
    ->name('catby');
    Route::get('/{opt}', [CategoryController::class, 'catby'])
//    ->where('opt', '\w+[0-9_]+')
    ->name('newsbyslug');
    Route::get('/newsby/{opt}/{id}', [NewsController::class, 'newsby'])
//    ->where('opt', '\w+[0-9_]+')
    ->name('newsby');
});

//Route::get('/newspage', function () {
//    return view('newspage');
//});

Route::get('/page/{id}', [NewsController::class, 'show'])
->where('id', '[0-9]+')
->name('newspage');

Route::get('/', [IndexController::class, 'index'])->name('homepage');
Route::get('/index', [IndexController::class, 'index'])->name('homepage');
Route::get('/home', [IndexController::class, 'index'])->name('homepage');
Route::get('/homepage', [IndexController::class, 'index'])->name('homepage');

Route::get('/hello', function () {
    return view('hello');
})->name('hello');

//(1)
//Route::get('/admin', [AdminController::class, 'index'])->name('admin');
//Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
//Route::get('/test2', [AdminController::class, 'test2'])->name('test2');

//(2) + menus changes..
//Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
//Route::get('/admin/test1', [AdminController::class, 'test1'])->name('admin.test1');
//Route::get('/admin/test2', [AdminController::class, 'test2'])->name('admin.test2');

//(3)
Route::name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
//    Route::get('/news', [NewsAdminController::class, 'index'])->name('lastnews');
//    Route::get('/news/{id}', [NewsAdminController::class, 'show'])
//    ->where('id', '[0-9]+')
//    ->name('show');
    Route::resource('news', NewsAdminController::class);
    Route::resource('news.show', NewsAdminController::class);
    Route::resource('categories', CategoryAdminController::class);
    Route::resource('categories.show', CategoryAdminController::class);
    Route::get('/test1', [AdminController::class, 'test1'])->name('test1');
    Route::get('/test2', [AdminController::class, 'test2'])->name('test2');    
});