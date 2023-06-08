<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::resource('lessons', LessonController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page}/{subs?}', ['uses' => '\App\Http\Controllers\PageController@index'])
    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);


