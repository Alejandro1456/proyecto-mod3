<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutoController;
use App\Models\Instituto;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('institutos', InstitutoController::class);
Route::get('institutos/generate/{id}', [InstitutoController::class, 'generate'])->name('generate');
//para agrupar
Route::controller(InstitutoController::class)->group(function(){
    Route::get('instituto.index');
    Route::post('instituto-import','import')->name('instituto.import');
    Route::get('instituto-export','export')->name('instituto.export');
});