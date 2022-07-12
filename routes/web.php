<?php

use App\Http\Controllers\UpdateController;
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

Route::resource('updates', UpdateController::class);
Route::resource('bases', \App\Http\Controllers\itemviewer\BaseController::class);
Route::resource('uniques', \App\Http\Controllers\itemviewer\UniqueCountroller::class);

Route::get('/upload/unique', [\App\Http\Controllers\BaseUploadController::class, 'unique']);
Route::get('/baseitems/{id}', [\App\Http\Controllers\baseItemShowController::class, 'all']);


Route::get('/upload/string', [\App\Http\Controllers\BaseUploadController::class, 'strings']);
Route::get('/upload/skills', [\App\Http\Controllers\BaseUploadController::class, 'Skills']);
Route::get('/upload/skilldesc', [\App\Http\Controllers\BaseUploadController::class, 'SkillDesc']);
Route::get('/upload/seti', [\App\Http\Controllers\SetItemUploadController::class, 'index']);
Route::get('/upload/base/{id}', [\App\Http\Controllers\BaseUploadController::class, 'base']);
Route::get('/upload/itemstatcost', [\App\Http\Controllers\BaseUploadController::class, 'itemStatCost']);
Route::get('/upload/propertiess', [\App\Http\Controllers\BaseUploadController::class, 'propertiesString']);
Route::get('/upload/gems', [\App\Http\Controllers\BaseUploadController::class, 'gems']);
Route::get('/upload/prop', [\App\Http\Controllers\BaseUploadController::class, 'properties']);
Route::get('/upload', [\App\Http\Controllers\BaseUploadController::class, 'index']);
Route::get('/upload/properties', [\App\Http\Controllers\PropertiesUploadController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
