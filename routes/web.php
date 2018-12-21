<?php

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



// users - login
Route::get("/users/login", "UserController@login")->name("users.login");
Route::post("/users/login", "UserController@doLogin");



//Deconnexion de l'utilisateur
Route::get("users/logout", "UserController@logout")->name("users.logout");

//User
Route::resource("users", "UserController");


Route::get("/", function() {
    return redirect(route("posts.index"));
});



//Posts
Route::resource("posts", "PostController");





//php artisan make:controller UserController --resource
