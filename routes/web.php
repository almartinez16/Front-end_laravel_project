<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Comparator\SmartphoneController;
use App\Http\Controllers\Backend\AdminController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/detailed-list', [SmartphoneController::class, 'showDetailedList'])
    ->name('detailed_list');

Route::get('/list', [SmartphoneController::class, 'showNameList'])
    ->name('list');

Route::get('/search/{phone}', [SmartphoneController::class, 'searchPhone'])
    ->name('search')
    ->where('search', '.*');

// Route::resource(AdminController::class)->group(function () {
//     //Route::get('')
// })->middleware('auth');
