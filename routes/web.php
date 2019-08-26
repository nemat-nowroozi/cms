<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::namespace('CmsAuth')->group(function () { 

Route::get('/cmsshowlogin', 'CmsLoginController@showLoginForm')->name('cms.showlogin');
Route::post('/cmslogin', 'CmsLoginController@login')->name('cms.login');
Route::get('/cmslogout', 'CmsLoginController@logout')->name('cms.logout');

Route::get('/cmsshowregister', 'CmsRegistrationController@showRegistrationForm')->name('cms.showregister');;
Route::post('/cmsregister', 'CmsRegistrationController@register')->name('cms.register');

});




Route::resource('admin/users', 'Admin\AdminUserController');
Route::resource('admin/posts', 'Admin\AdminPostController');
Route::resource('admin/categories', 'Admin\AdminCategoryController');
Route::resource('admin/photos', 'Admin\AdminPhotoController');

Route::get('admin/dashboard', 'Admin\DashboardController@index')->name('dashboard.index');

Route::get('admin/comments', 'Admin\CommentController@index')->name('comments.index');
Route::post('admin/actions/{id}', 'Admin\CommentController@actions')->name('comments.actions');
Route::get('admin/comments/{id}', 'Admin\CommentController@edit')->name('comments.edit');
Route::patch('admin/comments/{id}', 'Admin\CommentController@update')->name('comments.update');
Route::delete('admin/comments/{id}', 'Admin\CommentController@destroy')->name('comments.destroy');

Route::delete('admin/photos', 'Admin\AdminPhotoController@deleteAll')->name('photo.delete.all');



Route::group(['middleware' => 'admin'], function ()
 {



    
    
        


});



Route::get('/', 'Frontend\MainController@index');
Route::post('/', 'Frontend\MainController@index');


Route::get('posts/{slug}', 'Frontend\PostController@show')->name('frontend.posts.show');
Route::get('search', 'Frontend\PostController@searchTitle')->name('frontend.posts.search');
Route::get('filter/{id}', 'Frontend\PostController@postFilter')->name('frontend.posts.filter');
    
            
Route::post('comments{postId}', 'Frontend\CommentController@store')->name('frontend.comments.store');
Route::post('comments', 'Frontend\CommentController@reply')->name('frontend.comments.reply');



Auth::routes();

