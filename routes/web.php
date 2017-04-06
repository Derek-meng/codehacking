<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


//Route::post('/api/search','AdminUsersController@search');

Route::post('/blog','AdminPostController@home_search');
Route::get('/','AdminPostController@homeIndex')->name('home.Index');
Route::get('/about', 'AboutMeController@aboutme')->name('home.aboutme');
Route::resource('/contact','ContactController',['names'=>[
    'index'=>'Contact.Controller.index',
    'store'=>'Contact.Controller.store',
]]);
Route::get('/post/{id}', ['as' => 'home.post', 'uses' => 'AdminPostController@post']);
Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::resource('admin/aboutme', 'AboutMeController', ['names' => [
        'index' => 'admin.aboutme.index',
        'create' => 'admin.aboutme.create',
        'store' => 'admin.aboutme.store',
        'edit' => 'admin.aboutme.edit'
    ]]);

    Route::resource('admin/users', 'AdminUsersController', ['names' => [
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'
    ]]);
    Route::get('/api/search','AdminUsersController@search');


    Route::resource('admin/posts', 'AdminPostController', ['names' => [
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
    ]]);
    Route::post('admin/posts/search','AdminPostController@search');

    Route::resource('admin/categories', 'AdminCategoriesController', ['names' => [

        'index' => 'admin.catergories.index',
        'create' => 'admin.catergories.create',
        'store' => 'admin.catergories.store',
        'edit' => 'admin.catergories.edit'

    ]]);

    Route::resource('admin/media', 'AdminMediasController', ['names' => [

        'index' => 'admin.media.index',
        'create' => 'admin.media.create',
        'store' => 'admin.media.store',
        'edit' => 'admin.media.edit'

    ]]);
    Route::resource('admin/message', 'AdminContactController', ['names' => [

        'index' => 'admin.contact.index',
        'show'=>'admin.contact.show',
        'update'=>'admin.contact.update',
    ]]);
    Route::post('admin/message/search','AdminContactController@search');

    Route::resource('admin/replyMessage', 'ReplyMessageController', ['names' => [

        'index' => 'admin.replymessage.index',
        'show'=>'admin.replymessage.show',
//        'update'=>'admin.replymessage.update',
    ]]);
    Route::post('admin/replyMessage','ReplyMessageController@search');

    Route::resource('admin/comments', 'PostCommentsController', ['names' => [

        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit',
        'show' => 'admin.comments.show'

    ]]);


    Route::resource('admin/comment/replies', 'CommentRepliesController', ['names' => [

        'index' => 'admin.replies.index',
        'create' => 'admin.replies.create',
        'store' => 'admin.replies.store',
        'edit' => 'admin.replies.edit'

    ]]);


});
