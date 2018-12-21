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
Route::get('/', [
    'as' => 'home',
    'uses' => 'Home@page'
]);
Route::get('/dashboard', [
    'as' => 'dashboard',
    'uses' => 'Dashboard@page'
]);
Route::get('/dashboard/login', 'Dashboard@loginPage');
Route::get('/dashboard/logout', [
    'as' => 'logout',
    'uses' => 'Dashboard@logout'
]);
Route::post('/dashboard/login', [
    'as' => 'login',
    'uses' => 'Dashboard@login'
]);
