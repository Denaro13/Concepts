<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\ConceptLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, "index"])->name('dashboard');



//CONCEPTS
Route::get('/concepts/{id}', [ConceptController::class, "show"])->name('concepts.show');

Route::get('/concepts/{id}/edit', [ConceptController::class, "edit"])->name('concepts.edit')->middleware('auth');

Route::put('/concepts/{id}', [ConceptController::class, "update"])->name('concepts.update')->middleware('auth');

Route::post('/concepts', [ConceptController::class, "store"])->name('concepts.store')->middleware('auth');

Route::delete('/concepts/{id}', [ConceptController::class, "destroy"])->name('concepts.destroy')->middleware('auth');


//COMMENTS
//model, //controller, //migration, //set up routes
Route::post('/concepts/{id}/comments', [CommentController::class, "store"])->name('concepts.comments.store')->middleware('auth');


//REGISTER
Route::get('/register', [AuthController::class, "register"])->name('register');
Route::post('/register', [AuthController::class, "store"]);


// LOGIN and LOGOUT
Route::get('/login', [AuthController::class, "login"])->name('login');

Route::post('/login', [AuthController::class, "authenticate"]);

Route::post('/logout', [AuthController::class, "logout"])->name('logout');


Route::resource('users', UserController::class)->only('show');
Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('concepts/{concept}/like', [ConceptLikeController::class, 'like'])->middleware('auth')->name('concepts.like');
Route::post('concepts/{concept}/unlike', [ConceptLikeController::class, 'unlike'])->middleware('auth')->name('concepts.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
