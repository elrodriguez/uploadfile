<?php

use App\Http\Controllers\ThesisController;
use App\Models\Thesis;
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
    $theses = Thesis::all();
    return view('thesis')->with('theses',$theses);
});

Route::post('/thesis/register', [ThesisController::class, 'store'])->name('thesis_register');
Route::get('/thesis/file/{id}', [ThesisController::class, 'urlfile'])->name('thesis_file');
Route::post('/thesis/update', [ThesisController::class, 'update'])->name('thesis_update');
Route::post('/thesis/update/{id}', [ThesisController::class, 'destroy'])->name('thesis_delete');
