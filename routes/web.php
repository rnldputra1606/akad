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

Auth::routes();

Route::get('register','Auth\RegisterController@getRegister');
Route::get('kelurahan/get/{id}','Auth\RegisterController@getKelurahan');

Route::get('/registerKades', 'adminController@index');
Route::get('kelurahan/get/{id}', 'adminController@getKelurahan');

Route::get('/home', 'HomeController@dashboard')->name('home');

Route::get('/registerKades','adminController@buatKades');
Route::POST('/insertKades','adminController@insertKades');

// buat ubah ubah profil
Route::get('/profilAdmin/{id}', 'adminController@profil');
Route::post('/updateProfil2/{id}', 'adminController@updateProfil2')->name('profil');

Route::get('/profilKades/{id}', 'kadesController@profil');
Route::post('/updateProfil1/{id}', 'kadesController@updateProfil1')->name('profil');

Route::get('/profilGuest/{id}', 'guestController@profil');
Route::post('/updateProfil/{id}', 'guestController@updateProfil')->name('profil');

Route::get('/dashboardAdmin', 'adminController@home');
Route::get('/dashboardKades', 'kadesController@home');
Route::get('/dashboardGuest', 'guestController@home');

Route::get('auth/register', 'HomeController@getKecamatan');
