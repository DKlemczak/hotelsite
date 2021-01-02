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
});
