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

// Route::get('/', function () {
//     return view('welcome');
// });




Auth::routes();


Route::get('/{id}/category','FrontendController@albumCategory')->name('album.category');

Route::get('/profile','FollowController@profile')->name('profile')->middleware('auth');

Route::get('/user/{id}','FollowController@userProfilePic')->middleware('auth');
Route::post('profile-pic','FollowController@updateProfilePic')->middleware('auth');
Route::post('bg-pic','FollowController@updatebgPic')->middleware('auth');
Route::get('/user/bg/{id}','FollowController@userbgPic')->middleware('auth');


Route::get('/','FrontendController@index');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::post('/follow',"FollowController@followUnfollow")->middleware('auth');

Route::get('/user/profile/{id}','FrontendController@userAlbum')->name('user.album');

Route::get('/albums/{slug}/{id}','GalleryController@viewAlbum')->name('view.album');


Route::get('/getalbums','AlbumController@getAlbums')->middleware('auth');

Route::get('getimages','GalleryController@images')->middleware('auth');;

Route::delete('/image/{id}','GalleryController@destroy');

Route::get('/albums/create','AlbumController@create')->name('album.create')->middleware('auth');
Route::get('/albums','AlbumController@index')->middleware('auth');


Route::post('/albums/store','AlbumController@store')->middleware('auth');
Route::put('albums/{id}/edit','AlbumController@update')->middleware('auth');

Route::delete('/albums/{id}/delete','AlbumController@destroy')->middleware('auth');

Route::get('upload/images/{id}','GalleryController@create')->middleware('auth');
Route::post('uploadImage','GalleryController@upload')->middleware('auth');

