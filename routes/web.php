<?php


use App\Http\Controllers\FullCalendarController;
use App\Models\Posts;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\AdminController;
use App\http\Controllers\PostsController;
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

//Nouveau posts
Route::post('/newpost', [UserController::class, 'login'])->middleware('auth');

//page de profil
Route::get('/profil/{username}',[ProfilController::class, 'show_profil_page']);

//page des préférences & parametre
Route::get('/users/preferences',[ProfilController::class, 'show_preference_page']);
Route::post('/users/preferences/change',[ProfilController::class, 'change_preference']);


//page des salles
Route::get('/getevent', [FullCalendarController::class,'getEvent']);
Route::post('/createevent',[FullCalendarController::class,'createEvent']);
Route::post('/deleteevent',[FullCalendarController::class,'deleteEvent']);


//messagerie
Route::get('/message', [MessageController::class,'show_message_page']);
Route::get('/message/afficher', [MessageController::class,'show_messages']);

//page admin
Route::get('/admin_choice', [AdminController::class,'show_admin_choice']);


Route::get('/admin', [AdminController::class,'show_admin_page']);
Route::post('/admin/delete/{id}', [AdminController::class,'delete_user']);
Route::post('/admin/modify/{id}', [AdminController::class,'modify_user']);
Route::post('/admin/modify/apply/{id}', [AdminController::class,'modify_user_apply']);

Route::get('/admin/room', [AdminController::class,'show_admin_room']);
Route::get('/admin/room/create', [AdminController::class,'create_room_page']);
Route::post('/admin/room/create/apply', [AdminController::class,'create_room_apply']);

Route::post('/admin/room/modify/{id}', [AdminController::class,'modify_room']);
Route::post('/admin/room/modify/apply/{id}', [AdminController::class,'modify_room_apply']);


//page des posts
Route::get('/newpost', [PostsController::class,'show_post_page']);
Route::post('/postcreation', [PostsController::class,'create']);

//page des salles ( EDT )

