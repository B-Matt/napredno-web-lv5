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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
Route::post('/admin', [App\Http\Controllers\HomeController::class, 'changeRole'])->name('changeRole');

Route::get('/assignee/{studentId?}/{task?}', [App\Http\Controllers\TaskController::class, 'acceptAssignee'])->name('accept');
Route::get('/sign/{studentId?}/{task?}', [App\Http\Controllers\TaskController::class, 'taskSign'])->name('sign');

Route::group([
    'prefix' => '{locale}', 
    'where' => ['locale' => 'en|hr'],
    'middleware' => 'locale'
], function() {
    Route::get('/new', [App\Http\Controllers\TaskController::class, 'index'])->name('create-task');
    Route::post('/new', [App\Http\Controllers\TaskController::class, 'store'])->name('create');
});
