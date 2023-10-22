<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Unprotected Routes
Route::get('/posts', 'App\Http\Controllers\Api\PostController@index');
Route::get('/post/{post}','App\Http\Controllers\Api\PostController@show');

//!TODO AUTH CONTROLLER
Route::post('/register','App\Http\Controllers\Api\AuthController@register');
Route::post('login','App\Http\Controllers\Api\AuthController@login');

//Protected Routes (Auth)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/post/create','App\Http\Controllers\Api\PostController@store');
    //the update and delete is post not put or delete because HTML forms can't make PUT, PATCH, or DELETE requests reference: https://stackoverflow.com/questions/50691938/patch-and-put-request-does-not-working-with-form-data
    Route::post('/post/update/{post}','App\Http\Controllers\Api\PostController@update');
    Route::post('/post/delete/{post}','App\Http\Controllers\Api\PostController@destroy');
    Route::post('/logout','App\Http\Controllers\Api\AuthController@logout');
});