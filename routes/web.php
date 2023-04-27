<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;


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

//page index
Route::get('/', [IndexController::class, 'index']);

//page inscription
Route::get('/register', [UserController::class, 'create'])->name('register');

//creation nouveau user
Route::post('/users', [UserController::class, 'register']);

//deconnexion user
Route::post('/logout', [UserController::class, 'logout']);

//connexion
Route::post('/login', [UserController::class, 'login']);

//Nouveau post
Route::post('/newpost', [UserController::class, 'login'])->middleware('auth');

//page de profil
Route::get('/profil/{username}',[ProfilController::class, 'show_profil_page']);

//page des préférences
Route::get('/users/preferences',[ProfilController::class, 'show_preference_page']);
Route::post('/users/preferences/change',[ProfilController::class, 'change_preference']);


