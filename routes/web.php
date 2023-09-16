<?php

use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController;



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
    return view('main');
})->name('home');


    Route::get('/posts', IndexController::class)->name('posts.index');
    Route::get('/posts/create', CreateController::class)->name('posts.create');
    Route::post('/posts', StoreController::class)->name('posts.store');
    Route::get('/posts/{post}', ShowController::class)->name('posts.show');
    Route::get('/posts/{post}/edit', EditController::class)->name('posts.edit');
    Route::patch('/posts/{post}', UpdateController::class)->name('posts.update');
    Route::delete('/posts/{post}', DeleteController::class)->name('posts.delete');


//    ADMIN
Route::group(['prefix' => 'admin', 'as' =>'admin.', 'middleware' => 'admin'],  function (){
    Route::view('/', 'admin.dashboard')->name('index');
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function (){
        Route::get('/', AdminPostIndexController::class)->name('index');
    });

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
