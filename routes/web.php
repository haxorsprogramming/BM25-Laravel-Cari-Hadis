<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_MainApp;
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

Route::get('/', [C_MainApp::class, 'dashboard']);
Route::get('/beranda', [C_MainApp::class, 'beranda']);