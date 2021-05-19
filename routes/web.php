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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','admin']],function()
{
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/child', function () {
        return view('admin.child');
    });
    Route::get('/vaccine', function () {
        return view('admin.vaccine');
    });
    Route::get('/registerHP','App\Http\Controllers\Api\HealthPersonnelController@registered');
    Route::get('/edit-role/{id}','App\Http\Controllers\Api\HealthPersonnelController@registeredit');
    Route::put('/update-role/{id}','App\Http\Controllers\Api\HealthPersonnelController@registerupdate');
    Route::delete('/delete-role/{id}','App\Http\Controllers\Api\HealthPersonnelController@registeredelete');

    Route::get('/child','App\Http\Controllers\Api\ChildController@show');
    Route::get('/vaccine','App\Http\Controllers\Api\VaccineController@show');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
