<?php


use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SallesController;

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

//page des préférences & parametre
Route::get('/users/preferences',[ProfilController::class, 'show_preference_page']);
Route::post('/users/preferences/change',[ProfilController::class, 'change_preference']);

Route::get('/salles', [SallesController::class, 'show_salle_page']);
//page des salles
//messagerie
Route::get('/message', [MessageController::class,'show_message_page']);
Route::get('/message/afficher', [MessageController::class,'show_messages']);
