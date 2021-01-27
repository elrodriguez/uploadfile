<?php

use App\Http\Controllers\ThesisController;
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
Route::get('/thesis', function () {
    return view('thesis');
});
Route::get('/thesis/register', [ThesisController::class, 'store'])->name('thesis_register');
