<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Route::apiResources(['users' => 'API\UserController']);
//Route::post('users/register', 'API\UserController@create'); // Signup
Route::post('users/registeration', 'API\UserController@register');
Route::post('users/login', 'API\UserController@login');

//Route::get('users/list', 'API\UserController@index'); // Signup