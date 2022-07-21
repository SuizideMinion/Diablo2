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


Route::resources([
    '/' => \App\Http\Controllers\NewsController::class,
    'news' => \App\Http\Controllers\NewsController::class,
    ]);

Route::resource('updates', UpdateController::class);
Route::resource('bases', \App\Http\Controllers\itemviewer\BaseController::class);
Route::resource('uniques', \App\Http\Controllers\itemviewer\UniqueCountroller::class);
//Route::resource('user/mules/runes', \App\Http\Controllers\User\Mule\UserMiscController::class, ['names' => 'usermisc']);
Route::post('user/mules/runes/{id}/new', [\App\Http\Controllers\User\Mule\UserMiscController::class, 'newMule']);
Route::get('user/mules/runes/{server}/edit', [\App\Http\Controllers\User\Mule\UserMiscController::class, 'edit']);
Route::post('user/mules/runes/{id}/store', [\App\Http\Controllers\User\Mule\UserMiscController::class, 'store']);
Route::get('user/mules/runes/{id}', [\App\Http\Controllers\User\Mule\UserMiscController::class, 'index']);
Route::delete('user/mules/runes/{id}', [\App\Http\Controllers\User\Mule\UserMiscController::class, 'destroy']);
Route::get('user/settings/mules/runes/{id}', [\App\Http\Controllers\User\Mule\UserMiscController::class, 'setting']);
Route::resource('user/data', \App\Http\Controllers\User\UserDataController::class, ['names' => 'userdata']);
Route::get('/upload/unique', [\App\Http\Controllers\BaseUploadController::class, 'unique']);
Route::get('/baseitems/{id}', [\App\Http\Controllers\itemviewer\BaseController::class, 'all']);


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

Route::get('dashboard', [\App\Http\Controllers\Auth\AuthController::class, 'dashboard']);
Route::get('login', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('login');
Route::post('custom-login', [\App\Http\Controllers\Auth\AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [\App\Http\Controllers\Auth\AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [\App\Http\Controllers\Auth\AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [\App\Http\Controllers\Auth\AuthController::class, 'signOut'])->name('signout');
