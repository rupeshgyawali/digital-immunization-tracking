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
    // Route::get('/user', function () {
    //     return view('admin.user');
    // });
    Route::get('/registerHP','App\Http\Controllers\Dashboard\HealthPersonnelController@registered');
    Route::get('/user','App\Http\Controllers\Dashboard\UserController@registered');
    Route::get('/edit-role/{id}','App\Http\Controllers\Dashboard\HealthPersonnelController@registeredit');
    Route::put('/update-role/{id}','App\Http\Controllers\Dashboard\HealthPersonnelController@registerupdate');
    Route::delete('/delete-role/{id}','App\Http\Controllers\Dashboard\HealthPersonnelController@registeredelete');

    Route::get('/child','App\Http\Controllers\Dashboard\ChildController@show');
    Route::get('/vaccine','App\Http\Controllers\Dashboard\VaccineController@show');
    Route::post('/addHP','App\Http\Controllers\Dashboard\HealthPersonnelController@store');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
