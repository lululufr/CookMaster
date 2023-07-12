<?php


use App\Http\Controllers\ClassController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ErrController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipateController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\LocalizationController;
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
Route::get('/profil/{username}',[ProfilController::class, 'show_profil_page'])->middleware('auth');

//page des préférences & parametre
Route::get('/users/preferences',[ProfilController::class, 'show_preference_page'])->middleware('auth');
Route::post('/users/preferences/change',[ProfilController::class, 'change_preference'])->middleware('auth');
Route::post('/users/preferences/pp/change/{id}',[ProfilController::class, 'change_pp'])->middleware('auth');


//page des salles
Route::get('/getevent', [FullCalendarController::class,'getEvent'])->middleware('auth');
Route::post('/createevent',[FullCalendarController::class,'createEvent'])->middleware('auth');
Route::post('/deleteevent',[FullCalendarController::class,'deleteEvent'])->middleware('auth');


//messagerie
Route::get('/conversation', [MessageController::class,'show_conversation'])->middleware('notforfree');
Route::get('/message/{id}', [MessageController::class,'show_message_page'])->middleware('notforfree');
Route::post('/message/{id}/send', [MessageController::class,'send_messages'])->middleware('notforfree');


//events
Route::get('/event/create', [EventController::class,'createEvent'])->middleware('auth');
Route::get('/user/event/create', [EventController::class,'createPrivateEvent'])->middleware('auth');
Route::post('/event/create', [EventController::class,'createEventApply'])->middleware('auth');
Route::get('/admin/events', [EventController::class,'get_all_events'])->middleware('auth');
Route::post('/event/delete/{id}', [EventController::class,'deleteEvent'])->middleware('auth');


//participation event
Route::post('/eventParticipate', [EventController::class,'participate'])->middleware('auth');


//page admin
Route::get('/admin_choice', [AdminController::class,'show_admin_choice'])->middleware('isadmin');


Route::get('/admin', [AdminController::class,'show_admin_page'])->middleware('isadmin');
Route::post('/admin/delete/{id}', [AdminController::class,'delete_user'])->middleware('isadmin');
Route::post('/admin/modify/{id}', [AdminController::class,'modify_user'])->middleware('isadmin');
Route::post('/admin/modify/apply/{id}', [AdminController::class,'modify_user_apply'])->middleware('isadmin');

Route::get('/admin/room', [AdminController::class,'show_admin_room'])->middleware('isadmin');
Route::get('/admin/room/create', [AdminController::class,'create_room_page'])->middleware('isadmin');
Route::post('/admin/room/create/apply', [AdminController::class,'create_room_apply'])->middleware('isadmin');

Route::post('/admin/room/modify/{id}', [AdminController::class,'modify_room'])->middleware('isadmin');
Route::post('/admin/room/modify/apply/{id}', [AdminController::class,'modify_room_apply'])->middleware('isadmin');

Route::get('/admin/article', [AdminController::class,'get_articles'])->middleware('isadmin');
Route::post('/admin/article/delete/{id}', [AdminController::class,'delete_article'])->middleware('isadmin');
Route::post('/admin/article/modify/{id}', [AdminController::class,'modify_article'])->middleware('isadmin');
Route::get('/admin/article/create', [AdminController::class,'create_article_page'])->middleware('isadmin');
Route::post('/admin/article/create/apply', [AdminController::class,'create_article_apply'])->middleware('isadmin');

Route::get('/admin/new/class', [AdminController::class,'new_class_page'])->middleware('auth');
Route::post('/admin/create/class', [AdminController::class,'create_classes'])->middleware('auth');

Route::get('/admin/tags', [AdminController::class,'get_tags'])->middleware('auth');
Route::post('/admin/delete/tags/{name}', [AdminController::class,'delete_tag'])->middleware('auth');
Route::post('/admin/create/tags', [AdminController::class,'create_tag'])->middleware('auth');

Route::get('/admin/ingredients', [AdminController::class,'get_ingredients'])->middleware('auth');
Route::post('/admin/delete/ingredients/{name}', [AdminController::class,'delete_ingredient'])->middleware('auth');
Route::post('/admin/create/ingredients', [AdminController::class,'create_ingredient'])->middleware('auth');


Route::get('/admin/utensils', [AdminController::class,'get_utensils'])->middleware('auth');
Route::post('/admin/delete/utensil/{id}', [AdminController::class,'delete_utensil'])->middleware('auth');
Route::post('/admin/create/utensil', [AdminController::class,'create_utensil'])->middleware('auth');
Route::post('/admin/create/utensil_type', [AdminController::class,'create_utensil_type'])->middleware('auth');


Route::get('/admin/chef/calendar', [FullCalendarController::class,'chefgetEvents'])->middleware('auth');
Route::post('/admin/event/activation', [EventController::class,'changeValidationStatus'])->middleware('auth');



//page des posts
Route::get('/recipe/create', [RecipesController::class,'show_recipe_page'])->middleware('isuser');
Route::post('/recipe/create', [RecipesController::class,'create'])->middleware('isuser');
Route::get('/recipe/{id}', [RecipesController::class,'detailed_recipe_view'])->middleware('auth');
Route::post('/recipe/comment/{id}', [RecipesController::class,'comment_send'])->middleware('notforfree');
//page des salles ( EDT )



//BOUTIQUE

Route::get('/shop', [ShopController::class,'show_shop_page'])->middleware('auth');
Route::get('/shop/{id}', [ShopController::class,'show_item'])->middleware('auth');

Route::get('/shop/cart/add/{id}', [ShopController::class,'add_item_cart'])->middleware('auth');
Route::get('/shop/cart/show', [ShopController::class,'show_cart'])->middleware('auth');

//paiement

Route::get('/pay', [StripePaymentController::class,'payment_page'])->middleware('auth');
Route::post('/pay', [StripePaymentController::class,'carts_payment'])->middleware('auth');



//FORMATIONS

Route::get('/class', [ClassController::class,'class_page'])->middleware('auth');
Route::get('/class/{id}/show', [ClassController::class,'class_chapters_page'])->middleware('auth');
Route::get('/class/{id}/certif/check', [ClassController::class,'certif_check'])->middleware('auth');

Route::get('/class/getcertification/{id}', [ClassController::class,'certification'])->middleware('auth');
//chapter
Route::post('/class/{id}/check', [ClassController::class,'chapters_check'])->middleware('auth');

//acheter formation
Route::get('/pay/classes/{id}', [ClassController::class,'pay_class'])->middleware('auth');





Route::get('/user/pref', [UserPrefController::class,'index'])->middleware('auth');

//modifier une formation
Route::get('/class/{id}/edit', [ClassController::class,'edit_class'])->middleware('auth');
Route::post('/class/chapter/{id}/edit/submit', [ClassController::class,'edit_class_submit'])->middleware('auth');
Route::post('/class/{id}/addform', [ClassController::class,'edit_class_add_form'])->middleware('auth');
Route::get('/class/{id}/delform', [ClassController::class,'edit_class_del_form'])->middleware('auth');

Route::get('/class/{id}/delete', [AdminController::class,'delete_class'])->middleware('auth');



Route::get('/plan', [PlanController::class,'index'])->middleware('auth');
Route::get('/plan/purchase/{plan}/{time}', [PlanController::class,'purchase_plan'])->middleware('auth');
Route::post('/plan/purchase/{plan}/{time}', [PlanController::class,'pay_plan'])->middleware('auth');
Route::get('/plan/purchase/free', [PlanController::class,'free_plan'])->middleware('auth');



//error
Route::get('/you/are/not/admin', [ErrController::class,'error_admin_redirect']);
Route::get('/you/are/free', [ErrController::class,'error_free_redirect']);



//pour tester email
Route::get('/test/email', [EmailController::class,'test_email']);



Route::get('/verify-account/{username}', [UserController::class,'verify_account']);


// Route qui permet de connaître la langue active
Route::get('/locale', [LocalizationController::class, 'getLang'])->name('getlang');

// Route qui permet de modifier la langue
Route::get('/locale/{lang}', [LocalizationController::class, 'setLang'])->name('setlang');



//les lives
Route::get('/live', [LiveController::class, 'index'])->middleware('auth');
Route::get('/live/list', [LiveController::class, 'list'])->middleware('auth');
Route::get('/live/list/{id}', [LiveController::class, 'show'])->middleware('auth');
Route::get('/live/register', [LiveController::class, 'register_show'])->middleware('auth');
Route::post('/live/register', [LiveController::class, 'register'])->middleware('auth');

Route::get('/live/setonline', [LiveController::class, 'setonline'])->middleware('auth');
Route::get('/live/setoffline', [LiveController::class, 'setoffline'])->middleware('auth');

Route::get('/live/mylive', [LiveController::class, 'mylive'])->middleware('auth');



