<?php


use App\Http\Controllers\ClassController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StripePaymentController;
use App\Models\Posts;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
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
Route::get('/admin/create/class', [AdminController::class,'new_class']);



//page des posts
Route::get('/new_post', [PostsController::class,'show_post_page']);
Route::post('/postcreation', [PostsController::class,'create']);
Route::get('/post/{id}', [PostsController::class,'detailed_post_view']);
//page des salles ( EDT )



//BOUTIQUE

Route::get('/shop', [ShopController::class,'show_shop_page']);
Route::get('/shop/{id}', [ShopController::class,'show_item']);

Route::get('/shop/cart/add/{id}', [ShopController::class,'add_item_cart']);
Route::get('/shop/cart/show', [ShopController::class,'show_cart']);

    //paiement

Route::get('/pay', [StripePaymentController::class,'payment_page']);
Route::post('/pay', [StripePaymentController::class,'payment']);



//FORMATIONS

Route::get('/class', [ClassController::class,'class_page']);
Route::get('/class/{id}/show', [ClassController::class,'class_chapters_page']);
Route::get('/class/{id}/certif/check', [ClassController::class,'certif_check']);

Route::get('/class/getcertification/{id}', [ClassController::class,'certification']);
//chapter
Route::get('/class/{id}/check', [ClassController::class,'chapters_check']);



