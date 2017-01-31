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

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/{id}', 'UserController@show');
Route::get('rela-test','FunctionalityTestingController@index');
Route::get('rela-property-test','FunctionalityTestingController@property');
Route::get('rela-property-image-test','FunctionalityTestingController@propertyImage');
Route::get('rela-autocomplete-address-test','FunctionalityTestingController@autocomplete_address');

Route::get('rela-iframe-test','FunctionalityTestingController@i_frame');
Route::get('rela-popup-test','FunctionalityTestingController@popup');
Route::get('success_rela_registration','FunctionalityTestingController@success_rela_registration');
Route::get('rela_auth','FunctionalityTestingController@rela_auth');
Route::get('property_create_test','FunctionalityTestingController@property_create_test');
Route::get('property_list','FunctionalityTestingController@property_list');

Route::post('attribute/map','AttributeController@map');
Route::post('ait/photos','AitController@getPhotos');


Route::resource('partner','PartnerController');
Route::resource('entity','EntityController');
Route::resource('attribute','AttributeController');
Route::resource('photo_up_standard','PhotoUpStandardFieldController');
Route::resource('endpoint','EndpointController');
Route::resource('ait','AitController');