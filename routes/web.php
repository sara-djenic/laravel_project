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

Route::get("/", "MoviesController@index");

Route::get("/register", "UserController@register");

Route::post("/user/create", "UserController@create");

Route::get("/login", "UserController@showForm");

Route::post("/login", "UserController@login");

Route::get("/logout", "UserController@logout");

Route::get("/movies/top", "MoviesController@top_lists");

Route::get("/actors/show_all", "ActorsController@show_all");

Route::get("/movie/show/{id}", "MoviesController@show_movie");

Route::get("/movie/like/{id}", "MoviesController@like");

Route::get("/movie/unlike/{id}", "MoviesController@unlike");

Route::post("/movie/rate", "MoviesController@rate");

Route::get("/recommended", "MoviesController@recommended");

Route::post("/movie/comment", "MoviesController@comment_movie");

Route::get("/actors/show_movies/{id}", "ActorsController@show_movies");

Route::middleware("is_admin")->group(function (){
    Route::get("/actors/create", "ActorsController@show");

    Route::post("/actors/create", "ActorsController@create");

    Route::get("/movies/create", "MoviesController@show");

    Route::post("/movies/create", "MoviesController@create");

    Route::get("/genres/create", "GenresController@show");

    Route::post("/genres/create", "GenresController@create");

    Route::get("/admin/movies", "MoviesController@admin_index");

    Route::get("/movie/edit/{id}", "MoviesController@edit");

    Route::post("/movie/edit/{id}", "MoviesController@update");

    Route::get("/movie/delete/{id}","MoviesController@delete");

    Route::get("/admin/actors", "ActorsController@show_all_admin");

    Route::get("/actor/edit/{id}", "ActorsController@edit");

    Route::post("/actor/edit/{id}", "ActorsController@update");

    Route::get("/actor/delete/{id}", "ActorsController@delete");


    Route::get("/dashboard", function(){
        return view("layouts.admin");
    });
});
