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


//show the login view
Route::get('login','Auth\LoginController@showLoginForm')->name('login')->middleware('guest');

Route::post('login','Auth\LoginController@login')->name('login')->middleware('guest');


//Authenticate a user
//Route::post('/','Auth\LoginController@authenticate')->name('auth.authenticate');

####HOME PAGE #########
//Route::get('/', 'FrontpageController@index')->name('home');


Route::get('/', function () {
    return view('homepage');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' =>['auth'] ,'as'=>'admin.'], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
  
});

//Route::get('/role', 'HomeController@index')->name('role');

Route::get('dashboard','DashboardController@index')->name('dashboard');

//Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin'],'as'=>'admin.'], function(){
     Route::get('dashboard','DashboardController@index')->name('dashboard');
    

    // Route::resource('tags','TagController');
    // Route::resource('categories','CategoryController');
    // Route::resource('posts','PostController');
    // Route::resource('features','FeatureController');
    // Route::resource('properties','PropertyController');
    // Route::post('properties/gallery/delete','PropertyController@galleryImageDelete')->name('gallery-delete');
    // #######NEW###
    // Route::resource('propertydevelopers','PropertydeveloperController');
    // Route::resource('propertytype','PropertyTypeController');
    // Route::resource('projects','ProjectController');




    // Route::resource('sliders','SliderController');
    // Route::resource('services','ServiceController');
    // Route::resource('testimonials','TestimonialController');

    // Route::get('galleries/album','GalleryController@album')->name('album');
    // Route::post('galleries/album/store','GalleryController@albumStore')->name('album.store');
    // Route::get('galleries/{id}/gallery','GalleryController@albumGallery')->name('album.gallery');
    // Route::post('galleries','GalleryController@Gallerystore')->name('galleries.store');

    // Route::get('settings', 'DashboardController@settings')->name('settings');
    // Route::post('settings', 'DashboardController@settingStore')->name('settings.store');

     Route::get('profile','DashboardController@profile')->name('profile');
     Route::post('profile','DashboardController@profileUpdate')->name('profile.update');

    // Route::get('message','DashboardController@message')->name('message');
    // Route::get('message/read/{id}','DashboardController@messageRead')->name('message.read');
    // Route::get('message/replay/{id}','DashboardController@messageReplay')->name('message.replay');
    // Route::post('message/replay','DashboardController@messageSend')->name('message.send');
    // Route::post('message/readunread','DashboardController@messageReadUnread')->name('message.readunread');
    // Route::delete('message/delete/{id}','DashboardController@messageDelete')->name('messages.destroy');
    // Route::post('message/mail', 'DashboardController@contactMail')->name('message.mail');

     Route::get('changepassword','DashboardController@changePassword')->name('changepassword');
     Route::post('changepassword','DashboardController@changePasswordUpdate')->name('changepassword.update');
     Route::get('user',                   [ 'as'=>'user',                 'uses' => 'UserController@index']);
     
     ######STATE
    //  Route::get('state',               [ 'as'=>'state',              'uses' => 'StateController@index']);
    //  Route::get('state/create',        [ 'as'=>'state.create',       'uses' => 'StateController@create']);
    //  Route::post('state/store',        [ 'as'=>'state.store',        'uses' => 'StateController@store']);
    //  Route::get('state/edit/{id}',     [ 'as'=>'state.edit',         'uses' => 'StateController@edit']);
    //  Route::post('state/update/{id}',  [ 'as'=>'state.update',       'uses' => 'StateController@update']);
    //  Route::get('state/delete/{id}',   [ 'as'=>'state.delete',       'uses' => 'StateController@delete']);
      Route::get('state/search',            [ 'as'=>'state.search',      'uses' => 'StateController@search']);
    //  Route::get('/state/{id}', 'StateController@stateshow')->name('state.show');
    //
    Route::resource('state','StateController');
    // Route::resource('state', 'StateController')->except(['create', 'store', 'update', 'destroy'
    // ]);
     ##########CITY##
     Route::resource('city','CityController');
     Route::get('city/search',            [ 'as'=>'city.search',      'uses' => 'CityController@search']);
###########COUNTRY
     Route::resource('country','CountryController');
     Route::get('country/search',            [ 'as'=>'country.search',      'uses' => 'CountryController@search']);
 
     ###############Charger Types ########

     Route::resource('chargertype','ChargertypeController');
     Route::get('chargertype/search',            [ 'as'=>'chargertype.search',      'uses' => 'ChargertypeController@search']);
 ###############COMPANY ########
     Route::resource('company','CompanyController');
     Route::get('company/search',            [ 'as'=>'company.search',      'uses' => 'CompanyController@search']);

     #########EV STATIONS
Route::resource('evstation','EvstationsController');
Route::get('evstation/search',            [ 'as'=>'evstation.search',      'uses' => 'EvstationsController@search']);

###########
Route::resource('automatedstatus','AutomatedStatusController');
Route::get('automatedstatus/search',            [ 'as'=>'automatedstatus.search',      'uses' => 'AutomatedStatusController@search']);

//      Route::get('city',               [ 'as'=>'city',              'uses' => 'CityController@index']);
//      Route::get('city/create',        [ 'as'=>'city.create',       'uses' => 'CityController@create']);
//      Route::post('city/store',        [ 'as'=>'city.store',        'uses' => 'CityController@store']);
//      Route::get('city/edit/{id}',     [ 'as'=>'city.edit',         'uses' => 'CityController@edit']);
//      Route::post('city/update/{id}',  [ 'as'=>'city.update',       'uses' => 'CityController@update']);
//      Route::get('city/delete/{id}',   [ 'as'=>'city.delete',       'uses' => 'CityController@delete']);
//  ##########Role##
Route::resource('role','RoleController');

//  Route::get('role',               [ 'as'=>'role',              'uses' => 'RoleController@index']);
//  Route::get('role/create',        [ 'as'=>'role.create',       'uses' => 'RoleController@create']);
//  Route::post('role/store',        [ 'as'=>'role.store',        'uses' => 'RoleController@store']);
//  Route::get('role/edit/{id}',     [ 'as'=>'role.edit',         'uses' => 'RoleController@edit']);
//  Route::post('role/update/{id}',  [ 'as'=>'role.update',       'uses' => 'RoleController@update']);
//  Route::get('role/delete/{id}',   [ 'as'=>'role.delete',       'uses' => 'RoleController@delete']);
 Route::get('role/search',            [ 'as'=>'role.search',      'uses' => 'RoleController@search']);
 //Route::get('/role/{id}', 'RoleController@roleshow')->name('role.show');

 ###############USER####
 Route::get('user',                   [ 'as'=>'user',                 'uses' => 'UserController@index']);
 Route::get('user/create',            [ 'as'=>'user.create',          'uses' => 'UserController@create']);
 Route::post('user/store',            [ 'as'=>'user.store',           'uses' => 'UserController@store']);
 Route::get('user/view/{id}',         [ 'as'=>'user.view',            'uses' => 'UserController@view']);
 Route::get('user/edit/{id}',         [ 'as'=>'user.edit',            'uses' => 'UserController@edit']);
 Route::post('user/update/{id}',      [ 'as'=>'user.update',     'uses' => 'UserController@update']);
 Route::get('user/delete/{id}',       [ 'as'=>'user.delete',          'uses' => 'UserController@delete']);
 Route::get('user/search',            [ 'as'=>'user.search',      'uses' => 'UserController@search']);
 Route::get('/user/{id}', 'UserController@usershow')->name('user.show');


//});