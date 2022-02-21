<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

//GET, 	    /photos, 	    index,  	photos.index
Route::get('posts', [PostController::class, 'index'])->name('posts.index');


//GET, 	/photos/create, 	create, 	photos.create
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//POST, 	/photos, 	store,       	photos.store
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


//GET, 	/photos/{photo}, 	show,    	photos.show
Route::get('/posts/{postID}', [PostController::class, 'show'])->name('posts.show');


//GET 	/photos/{photo}/edit 	edit 	photos.edit
Route::get('/posts/{postID}/edit', [PostController::class, 'edit'])->name('posts.edit');
//PUT/PATCH, 	/photos/{photo}, 	update, 	photos.update
Route::put('/posts/{postID}', [PostController::class, 'update'])->name('posts.update');


//DELETE 	/photos/{photo} 	destroy 	photos.destroy
Route::delete('/posts/{postID}', [PostController::class, 'destroy'])->name('posts.destroy');

//empty statement
Route::get('/empty', [PostController::class, 'empty'])->name('posts.empty');

//reset delete data statement
Route::get('/restored', [PostController::class, 'showDeleted'])->name('posts.showDeleted');
Route::get('/restored/{postID}', [PostController::class, 'restore'])->name('posts.restored');
