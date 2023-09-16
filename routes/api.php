<?php

use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'jwt.auth'], function (){
    Route::get('/posts', IndexController::class);
    Route::get('/posts/create', CreateController::class)->name('posts.create');
    Route::get('/posts/{post}/edit', EditController::class)->name('posts.edit');
    Route::patch('/posts/{post}', UpdateController::class)->name('posts.update');
    Route::delete('/posts/{post}', DeleteController::class)->name('posts.delete');
    Route::post('/posts', StoreController::class)->name('posts.store');
});

Route::get('/posts', IndexController::class)->name('posts.index');
Route::get('/posts/{post}', ShowController::class)->name('posts.show');

