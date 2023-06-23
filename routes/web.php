<?php


use App\Http\Controllers\ClassController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipateController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UserPrefController;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecipesController;
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
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//connexion
Route::post('/login', [UserController::class, 'login']);

Route::get('/login_page', [UserController::class, 'login_page']);


//les recherches :
Route::get('/search_user', [SearchController::class, 'SearchUser'])->name('recherche.utilisateur');


//




//Nouveau posts
Route::post('/newpost', [UserController::class, 'login'])->middleware('auth');

//page de profil
Route::get('/profil/{username}',[ProfilController::class, 'show_profil_page']);

//page des préférences & parametre
Route::get('/users/preferences',[ProfilController::class, 'show_preference_page'])->middleware('auth');
Route::post('/users/preferences/change',[ProfilController::class, 'change_preference'])->middleware('auth');


//page des salles
Route::get('/getevent', [FullCalendarController::class,'getEvent'])->middleware('auth');
Route::post('/createevent',[FullCalendarController::class,'createEvent'])->middleware('auth');
Route::post('/deleteevent',[FullCalendarController::class,'deleteEvent'])->middleware('auth');


//messagerie
Route::get('/conversation', [MessageController::class,'show_conversation']);
Route::get('/message/{id}', [MessageController::class,'show_message_page']);
Route::post('/message/{id}/send', [MessageController::class,'send_messages']);


//events
Route::get('/event/create', [EventController::class,'createEvent']);
Route::post('/event/create', [EventController::class,'createEventApply']);
Route::get('/event/modify', [EventController::class,'modifyEvent']);
Route::post('/event/modify', [EventController::class,'modifyEventApply']);


//participation event
Route::post('/eventParticipate', [EventController::class,'participate']);


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

Route::get('/admin/article/create', [AdminController::class,'create_article_page']);
Route::post('/admin/article/create/apply', [AdminController::class,'create_article_apply']);

Route::get('/admin/new/class', [AdminController::class,'new_class_page']);
Route::post('/admin/create/class', [AdminController::class,'create_classes']);



//page des posts
Route::get('/recipe/create', [RecipesController::class,'show_recipe_page']);
Route::post('/recipe/create', [RecipesController::class,'create']);
Route::get('/recipe/{id}', [RecipesController::class,'detailed_recipe_view']);
//page des salles ( EDT )



//BOUTIQUE

Route::get('/shop', [ShopController::class,'show_shop_page']);
Route::get('/shop/{id}', [ShopController::class,'show_item']);

Route::get('/shop/cart/add/{id}', [ShopController::class,'add_item_cart']);
Route::get('/shop/cart/show', [ShopController::class,'show_cart']);

//paiement

Route::get('/pay', [StripePaymentController::class,'payment_page']);
Route::post('/pay', [StripePaymentController::class,'carts_payment']);



//FORMATIONS

Route::get('/class', [ClassController::class,'class_page']);
Route::get('/class/{id}/show', [ClassController::class,'class_chapters_page']);
Route::get('/class/{id}/certif/check', [ClassController::class,'certif_check']);

Route::get('/class/getcertification/{id}', [ClassController::class,'certification']);
//chapter
Route::post('/class/{id}/check', [ClassController::class,'chapters_check']);

//acheter formation
Route::get('/pay/classes/{id}', [ClassController::class,'pay_class']);





Route::get('/user/pref', [UserPrefController::class,'index']);

//modifier une formation
Route::get('/class/{id}/edit', [ClassController::class,'edit_class']);
Route::post('/class/chapter/{id}/edit/submit', [ClassController::class,'edit_class_submit']);
Route::post('/class/{id}/addform', [ClassController::class,'edit_class_add_form']);
Route::get('/class/{id}/delform', [ClassController::class,'edit_class_del_form']);

Route::get('/class/{id}/delete', [AdminController::class,'delete_class']);



Route::get('/plan', [PlanController::class,'index']);
Route::get('/plan/purchase/{plan}', [PlanController::class,'purchase_plan']);
Route::post('/plan/purchase/{plan}', [PlanController::class,'pay_plan']);




