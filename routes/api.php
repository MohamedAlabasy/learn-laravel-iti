<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/home', [PostsController::class, 'home']);

Route::post('/posts', [PostsController::class, 'store']);

Route::get('/posts/{postID}', [PostsController::class, 'show']);


//GET, 	/photos/{photo}, 	show,    	photos.show
//Route::get('/posts/{postID}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
//
//
////GET 	/photos/{photo}/edit 	edit 	photos.edit
//Route::get('/posts/{postID}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
////PUT/PATCH, 	/photos/{photo}, 	update, 	photos.update
//Route::put('/posts/{postID}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
//
//
////DELETE 	/photos/{photo} 	destroy 	photos.destroy
//Route::delete('/posts/{postID}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
//
////empty statement
//Route::get('/empty', [PostController::class, 'empty'])->name('posts.empty')->middleware('auth');
//
////reset delete data statement
//Route::get('/restored', [PostController::class, 'showDeleted'])->name('posts.showDeleted')->middleware('auth');
//Route::get('/restored/{postID}', [PostController::class, 'restore'])->name('posts.restored')->middleware('auth');
//
////for auth
//Auth::routes(); //ask eng noha
////Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

