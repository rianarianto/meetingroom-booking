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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/bookinglist', 'BookingController@index')->name('bookingList');
Route::get('/bookingadd', 'BookingController@create')->name('bookingAdd');
Route::get('/booking/cari','App\Http\Controllers\BookingController@cari')->name('booking.cari');
Route::resource('booking', 'App\Http\Controllers\BookingController');   

Route::get('/ruanganlist', 'RuanganController@index')->name('ruangan');
Route::get('/createRuangan', 'RuanganController@create')->name('createRuangan');
Route::resource('ruangan', 'App\Http\Controllers\RuanganController');

Route::resource('jenisRuangan', 'App\Http\Controllers\JenisRuanganController');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');




Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
