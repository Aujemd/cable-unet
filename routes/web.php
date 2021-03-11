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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/services', function () {
    return view('services');
})->name('services');

Route::middleware(['auth:sanctum', 'verified'])->get('/packages', function () {
    return view('packages');
})->name('packages');

Route::middleware(['auth:sanctum', 'verified'])->get('/plans', function () {
    return view('plans');
})->name('plans');


