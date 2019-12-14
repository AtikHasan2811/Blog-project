<?php



Route::get('/','HomeController@index')->name('home');

Route::post('subscriber','SubscriberController@store')->name('subscriber.store');

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

});




Route::group(['middleware'=>['auth']], function (){
    Route::post('favofite/{post}/add','FavoriteController@add')->name('post.favorite');
});






//...........................................author route...................................
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post','PostController');
//    ..................................setting route........................................................
    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');
});
