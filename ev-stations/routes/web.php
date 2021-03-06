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
//Route::get('login','Auth\LoginController@showLoginForm')->name('login')->middleware('guest');

//Route::post('login','Auth\LoginController@login')->name('login')->middleware('guest');


//Authenticate a user
//Route::post('/','Auth\LoginController@authenticate')->name('auth.authenticate');

####HOME PAGE #########
//Route::get('/', 'FrontpageController@index')->name('home');


// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', 'HomeController@index');
Auth::routes();

//Route::get('/roless', 'PermissionController@Permission');
//Route::get('/home', 'HomeController@index')->name('home');



  Route::group([ 'prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin'],'as'=>'admin.'],
  function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('profile','DashboardController@profile')->name('profile');
    Route::post('profile','DashboardController@profileUpdate')->name('profile.update');
    Route::get('changepassword','DashboardController@changePassword')->name('changepassword');
    Route::post('changepassword','DashboardController@changePasswordUpdate')->name('changepassword.update');

  #########STATE
  Route::get('state/search',[ 'as'=>'state.search','uses' => 'StateController@search']);
  Route::resource('state','StateController',['except' => 'show']);
  ##########CITY##
  Route::resource('city','CityController',['except' => 'show']);
  Route::get('city/search',[ 'as'=>'city.search','uses' => 'CityController@search']);
  ###########COUNTRY
  Route::resource('country','CountryController',['except' => 'show']);
  Route::get('country/search', [ 'as'=>'country.search','uses' => 'CountryController@search']);
    ###############Charger Types ########
  Route::resource('chargertype','ChargertypeController',['except' => 'show']);
  Route::get('chargertype/search',  [ 'as'=>'chargertype.search','uses' => 'ChargertypeController@search']);
  ###############COMPANY ########
  Route::resource('company','CompanyController',['except' => 'show']);
  Route::get('company/search', [ 'as'=>'company.search', 'uses' => 'CompanyController@search']);
  #########EV STATIONS
  Route::resource('chargingstations','ChargingStationsController',['except' => 'show']);
  Route::get('chargingstations/search',[ 'as'=>'chargingstations.search','uses' => 'ChargingStationsController@search']);
  #############
  Route::resource('amenities','AmenitiesController',['except' => 'show']);
  Route::get('amenities/search',[ 'as'=>'amenities.search','uses' => 'AmenitiesController@search']);
  #######admin.
  Route::resource('evstation','EvstationsController');
  Route::get('evstation/search',[ 'as'=>'evstation.search','uses' => 'EvstationsController@search']);
  ###########
  Route::resource('automatedstatus','AutomatedStatusController',['except' => 'show']);
  Route::get('automatedstatus/search',[ 'as'=>'automatedstatus.search','uses' => 'AutomatedStatusController@search']);
  ##########Role##
  Route::get('role/search' ,['as'=>'role.search','uses' => 'RoleController@search']);
  Route::resource('role','RoleController',['except' => 'show']);

  // Route::get('/role/showindex' ,'RoleController@showindex')->name('role.showindex');
  ######################
  Route::get('user/search' ,['as'=>'user.search','uses' => 'UserController@search']);
  Route::resource('user','UserController',['except' => 'show']);
  ##
  Route::get('vehicletype/search', ['as'=>'vehicletype.search','uses' => 'VehicleTypeController@search']);
  Route::resource('vehicletype','VehicleTypeController',['except' => 'show']);
  Route::get('vehicletype/autocomplete',['as'=>'vehicletype.autocomplete','uses'=>'VehicleTypeController@autocomplete']);

  ########
  Route::resource('brand','BrandTypeController',['except' => 'show']);
  Route::get('brand/search', [ 'as'=>'brand.search','uses' => 'BrandTypeController@search']);

  ##########
  Route::resource('modeltype','ModelTypeController',['except' => 'show']);
  Route::get('modeltype/search', [ 'as'=>'modeltype.search','uses' => 'ModelTypeController@search']);
  ############
  Route::resource('connectortype','ConnectorTypeController',['except' => 'show']);
  Route::get('connectortype/search', ['as'=>'connectortype.search','uses' => 'ConnectorTypeController@search']);
 
  ############
  Route::resource('networktypes','NetworkTypesController',['except' => 'show']);
  Route::get('networktypes/search', ['as'=>'networktypes.search','uses' => 'NetworkTypesController@search']);
 


});

 
#######END ADMIN

Route::group(['prefix'=>'subadmin','namespace'=>'Admin','middleware'=>['auth','subadmin'],'as'=>'subadmin.'],
 function(){
  Route::get('dashboard','DashboardController@index')->name('dashboard');
  Route::get('profile','DashboardController@profile')->name('profile');
  Route::post('profile','DashboardController@profileUpdate')->name('profile.update');
  Route::get('changepassword','DashboardController@changePassword')->name('changepassword');
  Route::post('changepassword','DashboardController@changePasswordUpdate')->name('changepassword.update');
  Route::get('user',[ 'as'=>'user', 'uses' => 'UserController@index']);
 

});

//  ###############USER####
//  Route::get('user',                   [ 'as'=>'user',                 'uses' => 'UserController@index']);
//  Route::get('user/create',            [ 'as'=>'user.create',          'uses' => 'UserController@create']);
//  Route::post('user/store',            [ 'as'=>'user.store',           'uses' => 'UserController@store']);
//  Route::get('user/view/{id}',         [ 'as'=>'user.view',            'uses' => 'UserController@view']);
//  Route::get('user/edit/{id}',         [ 'as'=>'user.edit',            'uses' => 'UserController@edit']);
//  Route::post('user/update/{id}',      [ 'as'=>'user.update',     'uses' => 'UserController@update']);
//  Route::get('user/delete/{id}',       [ 'as'=>'user.delete',          'uses' => 'UserController@delete']);
//  Route::get('user/search',            [ 'as'=>'user.search',      'uses' => 'UserController@search']);
//  Route::get('/user/{id}', 'UserController@usershow')->name('user.show');


//});