<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/event', [APIController::class,'api_event_get']);
Route::get('/recipe', [APIController::class,'api_recipe_get']);
Route::get('/message/{id}', [APIController::class,'api_message_get']);
Route::get('/conversation', [APIController::class,'api_conversation_get']);
Route::post('/message/send/{id}', [APIController::class,'api_send_messages']);



Route::post('/connexion', [APIController::class,'api_connexion']);
