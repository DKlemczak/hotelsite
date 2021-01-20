<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', "App\Http\Controllers\StaticController@index")->name("index");

Route::get('/offer', "App\Http\Controllers\OfferController@index")->name("offer");
Route::get('/offer/{id}',"App\Http\Controllers\OfferController@details")->name("offer.details");
Route::post('/offer/addtocart',"App\Http\Controllers\CartController@AddToCart")->name("offer.addtocart");

Route::get('/cart',"App\Http\Controllers\CartController@index")->name("cart");
Route::get('/cart/store',"App\Http\Controllers\CartController@store")->name("cart.store");
Route::get('/cart/removefromCart/{room}/{id}',"App\Http\Controllers\CartController@removefromCart")->name("cart.remove");

Route::post('/offer/{id}/addcomment',"App\Http\Controllers\OfferController@storecomment")->name("offer.details.addcomment");
Route::get('/offer/{id}/destroycomment',"App\Http\Controllers\OfferController@destroycomment")->name("offer.details.deletecomment")->middleware(['auth', 'admin']);

Route::get('/news', "App\Http\Controllers\NewsController@index")->name("news");
Route::get('/news/{id}', "App\Http\Controllers\NewsController@details")->name("news.details");

Route::post('/news/{id}/addcomment',"App\Http\Controllers\NewsController@storecomment")->name("news.details.addcomment");
Route::get('/news/{id}/destroycomment',"App\Http\Controllers\NewsController@destroycomment")->name("news.details.deletecomment")->middleware(['auth', 'admin']);

Route::get('/contact', "App\Http\Controllers\ContactController@index")->name("contact");
Route::post('/contact', "App\Http\Controllers\ContactController@store")->name("contact.save");

Route::get('/user', "App\Http\Controllers\UserController@index")->name("user");

Route::group(['middleware' => 'admin'], function ()
{
    Route::get("/dashboard", "App\Http\Controllers\Dashboard\DashboardController@index")->name('dashboard');
    Route::resource('dashboard/roomtypes', 'App\Http\Controllers\Dashboard\RoomtypesController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.roomtypes.index',
        'create'  => 'dashboard.roomtypes.create',
        'store'   => 'dashboard.roomtypes.store',
        'edit'    => 'dashboard.roomtypes.edit',
        'update'  => 'dashboard.roomtypes.update',
        'destroy' => 'dashboard.roomtypes.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/roomtypes/{roomtype_id}/roomtags_roomtypes', 'App\Http\Controllers\Dashboard\Roomtags_roomtypesController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.roomtypes.roomtags_roomtypes.index',
        'create'  => 'dashboard.roomtypes.roomtags_roomtypes.create',
        'store'   => 'dashboard.roomtypes.roomtags_roomtypes.store',
        'destroy' => 'dashboard.roomtypes.roomtags_roomtypes.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/roomtypes/{roomtype_id}/roomtype_attachments', 'App\Http\Controllers\Dashboard\RoomtypeAttachmentsController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.roomtypes.roomtype_attachments.index',
        'create'  => 'dashboard.roomtypes.roomtype_attachments.create',
        'store'   => 'dashboard.roomtypes.roomtype_attachments.store',
        'destroy' => 'dashboard.roomtypes.roomtype_attachments.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/roomtags', 'App\Http\Controllers\Dashboard\RoomTagsController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.roomtags.index',
        'create'  => 'dashboard.roomtags.create',
        'store'   => 'dashboard.roomtags.store',
        'edit'    => 'dashboard.roomtags.edit',
        'update'  => 'dashboard.roomtags.update',
        'destroy' => 'dashboard.roomtags.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/rooms', 'App\Http\Controllers\Dashboard\RoomsController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.rooms.index',
        'create'  => 'dashboard.rooms.create',
        'store'   => 'dashboard.rooms.store',
        'edit'    => 'dashboard.rooms.edit',
        'update'  => 'dashboard.rooms.update',
        'destroy' => 'dashboard.rooms.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/contact', 'App\Http\Controllers\Dashboard\RoomsController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.rooms.index',
        'create'  => 'dashboard.rooms.create',
        'store'   => 'dashboard.rooms.store',
        'edit'    => 'dashboard.rooms.edit',
        'update'  => 'dashboard.rooms.update',
        'destroy' => 'dashboard.rooms.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/news', 'App\Http\Controllers\Dashboard\NewsController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.news.index',
        'create'  => 'dashboard.news.create',
        'store'   => 'dashboard.news.store',
        'edit'    => 'dashboard.news.edit',
        'update'  => 'dashboard.news.update',
        'destroy' => 'dashboard.news.destroy'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);

    Route::resource('dashboard/contact', 'App\Http\Controllers\Dashboard\ContactController', ['except'=>['show'], 'names' => [
        'index'   => 'dashboard.contact.index',
        'update'  => 'dashboard.contact.update'
    ]], ['except' => ['show']])->middleware(['auth', 'admin']);
});
