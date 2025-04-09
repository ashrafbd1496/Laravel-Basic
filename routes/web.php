<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Home';
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/users/{id}', function ($id) {
    return $id;
});
Route::get('/users/{name}/{surname}', function ($name,$surname) {
    return $name. ' - '. $surname;
});

Route::get('/posts/{id}/comments/{comment}', function ($id, $comment) {
    return $id. ' - '. $comment;
});
//Post request 
Route::post('/posts/{id}/comments/{comment?}', function ($id, $comment = null) {
    return $id. ' - '. $comment;
})->where('id', '[0-9]+')->where('comment', '[0-9]+');

// Route Group
// Route::get('/user/profile', function(){
//     return "Profile Page";
// });
// Route::get('/user/password', function(){
//     return "PrUser Password";
// });

//make it group
Route::group(['prefix' => '/user' ], function(){
    Route::get('/profile', function(){
        return "Profile Page";
    });
    Route::get('/password', function(){
        return "Password Page";
    });
});
