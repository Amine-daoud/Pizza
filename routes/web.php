<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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


Route::get('/',[\App\Http\Controllers\HomeController::class,'home'])->name('home');
//Route::view('/admin','admin.admin_home')->middleware('auth')->name('admin.home')->middleware('is_admin');

//route pour la connexion
Route::get('/login', [\App\Http\Controllers\AuthentificationController::class,'formLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthentificationController::class,'login']);

//route pour se déconnecter
Route::get('/logout', [\App\Http\Controllers\AuthentificationController::class,'logout'])->name('logout')->middleware('auth');

//route pour s'inscrire
Route::get('/register', [\App\Http\Controllers\RegisterController::class,'formRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\RegisterController::class,'register']);

//route pour afficher la liste des pizzas
Route::get('/listepizza',[\App\Http\Controllers\PizzaController::class,'listePizza'])->name('listeP')->middleware('auth');

//route pour créer une pizza
Route::get('/ajouter',[\App\Http\Controllers\PizzaController::class,'ajouterPizza'])->name('ajouterP')->middleware('is_admin');
Route::post('/ajouter',[\App\Http\Controllers\PizzaController::class,'sauvegarderajout'])->name('sauveP')->middleware('is_admin');

//route pour supprimer une pizza
Route::get('/listepizza/{id}/supprimer',[\App\Http\Controllers\PizzaController::class,'supprimer'])->name('supprimerP')->middleware('is_admin');
Route::post('/listepizza/{id}/supprimer',[\App\Http\Controllers\PizzaController::class,'supprimerPizza'])->name('suppressionP')->middleware('is_admin');

//route pour modifier une pizza
Route::get('/listepizza/{id}/modifier',[\App\Http\Controllers\PizzaController::class,'modifier'])->name('modifierP')->middleware('is_admin');
Route::post('/listepizza/{id}/modifier',[\App\Http\Controllers\PizzaController::class,'modifierPizza'])->name('modification')->middleware('is_admin');

//route pour afficher la liste de tous les utilisateurs
Route::get('/listeuser',[\App\Http\Controllers\Admin::class,'listUtilisateur'])->name('listeU')->middleware('is_admin');

//route pour afficher la liste de tous les utilisateurs de type cook
Route::get('/listcook',[\App\Http\Controllers\Admin::class,'listCook'])->name('listeC')->middleware('is_admin');

//route pour changer le mot de passe
Route::get('/modifier_mdp',[\App\Http\Controllers\AuthentificationController::class,'modif_mdp'])->name('modifMdp')->middleware('auth');
Route::post('/modifier_mdp',[\App\Http\Controllers\AuthentificationController::class,'modifier_mdp'])->name('modifierMdp')->middleware('auth');

//route pour changer le mot de passe des utilisateurs de type cook
Route::get('/mdpcook/{id}',[\App\Http\Controllers\AuthentificationController::class,'modif_mdpCook'])->name('modifMdpCook')->middleware('is_admin');
Route::post('/mdpcook',[\App\Http\Controllers\AuthentificationController::class,'modifier_mdpCook'])->name('modifierMdpCook')->middleware('is_admin');

//route qui renvoie la vue pour choisir entre créer un compte admin ou cook
Route::get('/creer',[\App\Http\Controllers\Admin::class,'vueCreerU'])->name('creerU')->middleware('is_admin');

//route pour créer un compte admin
Route::get('/creeruser/admin',[\App\Http\Controllers\Admin::class,'creerA'])->name('creerA')->middleware('is_admin');
Route::post('/creeruser/admin',[\App\Http\Controllers\Admin::class,'creationAdmin'])->name('creationA')->middleware('is_admin');

//route pour créer un compte cook
Route::get('/creeruser/cook',[\App\Http\Controllers\Admin::class,'creerK'])->name('creerK')->middleware('is_admin');
Route::post('/creeruser/cook',[\App\Http\Controllers\Admin::class,'creationCook'])->name('creationK')->middleware('is_admin');

//route pour supprimer un utilisateur
Route::get('/listeuser/{id}/supprimer',[\App\Http\Controllers\Admin::class,'supprimerU'])->name('supprimU')->middleware('is_admin');
Route::post('/listeuser/{id}/supprimer',[\App\Http\Controllers\Admin::class,'suppressionU'])->name('suppressU')->middleware('is_admin');

