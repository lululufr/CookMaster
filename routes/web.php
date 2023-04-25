<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


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
Route::get('/', [PostController::class, 'index']);

//page inscription
Route::get('/register', [UserController::class, 'create']);

//creation nouveau user
Route::post('/users', [UserController::class, 'store']);

//deconnexion user
Route::post('/logout', [UserController::class, 'logout']);

//connexion
Route::post('/login', [UserController::class, 'login']);




Route::get('/profil/{username}',function($username){
   return response("profile de ".$username);
});

Route::get('/search',function(Request $request){
  return $request->name;
});
//
//Route::get('/connexion', function () {
//    return view('connexion');
//});


//Route::get('/', 'App\Http\Controllers\connexionController@index');
