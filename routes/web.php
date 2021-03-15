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

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ChangesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramsController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/dashboard', DashboardController::class);

Route::resource('/services', ServiceController::class);

Route::resource('/packages', PackageController::class);

Route::resource('/plans', PlanController::class);

Route::resource('/channels', ChannelController::class);

Route::resource('/bill', BillController::class);

Route::resource('/changes', ChangesController::class);

Route::resource('/users', UserController::class);

Route::resource('/programs', ProgramsController::class);
