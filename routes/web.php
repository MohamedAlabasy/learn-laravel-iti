<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;


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
    return view('auth.login'); //sol for logout ask.beso eng.noha about that
//    return view('welcome');
});

//GET, 	    /photos, 	    index,  	photos.index
Route::get('/home', [PostController::class, 'home'])->name('posts.home')->middleware('auth');


//GET, 	/photos/create, 	create, 	photos.create
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
//POST, 	/photos, 	store,       	photos.store
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');


//GET, 	/photos/{photo}, 	show,    	photos.show
Route::get('/posts/{postID}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');


//GET 	/photos/{photo}/edit 	edit 	photos.edit
Route::get('/posts/{postID}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
//PUT/PATCH, 	/photos/{photo}, 	update, 	photos.update
Route::put('/posts/{postID}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');


//DELETE 	/photos/{photo} 	destroy 	photos.destroy
Route::delete('/posts/{postID}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

//empty statement
Route::get('/empty', [PostController::class, 'empty'])->name('posts.empty')->middleware('auth');

//reset delete data statement
Route::get('/restored', [PostController::class, 'showDeleted'])->name('posts.showDeleted')->middleware('auth');
Route::get('/restored/{postID}', [PostController::class, 'restore'])->name('posts.restored')->middleware('auth');

//for auth
Auth::routes(); //ask eng noha
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//for git hup authorization

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
//    dd('callback');
    $githubUser = Socialite::driver('github')->user();
//    dd($githubUser);
    $user = User::where('email', $githubUser->email)->first();

    if ($user) {
        $user->update([
            'email' => $githubUser->email,
        ]);
    } else {
        $user = User::create([
            'id' => $githubUser->id,
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'remember_token' => $githubUser->token,
        ]);
    }

    Auth::login($user);

    return redirect('/home');
});
