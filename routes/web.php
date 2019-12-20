<?php

//............................postBYCategory..............................
Route::get('/category/{slug}','PostController@postByCategory')->name('category.posts');
Route::get('/tag/{slug}','PostController@postByTag')->name('tag.posts');



Route::get('/','HomeController@index')->name('home');


Route::get('posts','PostController@index')->name('post.index');
Route::get('post/{slug}','PostController@details')->name('post.details');

Route::post('subscriber','SubscriberController@store')->name('subscriber.store');
Route::get('/search','SearchController@search')->name('search');

Auth::routes();




Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function (){
//    'as'=>'admin'ki kre name('admin.home'); set kre
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/favorite','FavoriteController@index')->name('favorite.index');

//    ..........................settingeController......................
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');
//    .....................................................................

    Route::resource('tag','TagController');
    Route::resource('category','categoryController');
    Route::resource('post','PostController');
    Route::get('/pending/post','PostController@pending')->name('post.pending');
    Route::put('/post/approve/{id}','PostController@approval')->name('post.approve');
    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{id}','SubscriberController@destroy')->name('subscriber.destroy');

//    .........................comment controller.................................
    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');

//    .................................author controller...........................
    Route::get('authors','AuthorController@index')->name('author.index');
    Route::delete('authors/{id}','AuthorController@destroy')->name('author.destroy');

});




Route::group(['middleware'=>['auth']], function (){
    Route::post('favofite/{post}/add','FavoriteController@add')->name('post.favorite');
    Route::post('comment/{post}','CommentController@store')->name('comment.store');
});






//...........................................author route...................................
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post','PostController');
//    ..................................setting route........................................................
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');
    Route::get('/favorite','FavoriteController@index')->name('favorite.index');

    //    .........................comment controller.................................
    Route::get('comments','CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','CommentController@destroy')->name('comment.destroy');
});


View::composer('layouts.frontend.partial.footer',function ($view){
    $categories = App\Category::all();
    $view->with('categories',$categories);

});
