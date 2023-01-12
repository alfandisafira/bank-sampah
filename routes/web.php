<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;

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
    return view('beranda', [
        'title' => 'Beranda',
    ]);
});

Route::get('/beranda', function () {
    return view('beranda', [
        'title' => 'Beranda',
    ]);
});


Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login')->middleware('guest');
Route::post('/authenticate', 'App\Http\Controllers\LoginController@authenticate')->name('authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'App\Http\Controllers\AdminController@index');
    Route::get('/admin-get', 'App\Http\Controllers\AdminController@get')->name('transaction.get');
    Route::post('/admin-store', 'App\Http\Controllers\AdminController@store')->name('transaction.store');

    Route::get('/data', 'App\Http\Controllers\DataController@index');
    Route::post('/data-store', 'App\Http\Controllers\DataController@store')->name('data.store');

    Route::get('/report', 'App\Http\Controllers\ReportController@index');
    Route::get('/report-get', 'App\Http\Controllers\ReportController@get')->name('report.get');

    Route::get('/logout', 'App\Http\Controllers\LoginController@logout');
});
