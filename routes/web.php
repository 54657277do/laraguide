<?php

use App\Http\Controllers\inscriptionConnexion;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\chapterscontroller;
use App\Http\Controllers\courscontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/inscription', [inscriptionConnexion::class, 'inscription'])->name('inscription');
Route::post('/inscription', [inscriptionConnexion::class, 'inscriptionResponse']);

Route::get('/connexion', [inscriptionConnexion::class, 'connexion'])->name('connexion');
Route::post('/connexion', [inscriptionConnexion::class, 'connexionResponse']);

Route::delete('/logout', [inscriptionConnexion::class, 'logout'])->name("logout");
//******************************************************************************************** */
Route::get('/create-module', [ModulesController::class, 'create'])->name('creermodule')->middleware('auth');
Route::post('/create-module', [ModulesController::class, 'createFeedback'])->name('creermodule-Response')->middleware('auth');

Route::get('/modules', [ModulesController::class, 'listes'])->name('modules')->middleware('auth');
Route::delete('/delete', [ModulesController::class, 'delete'])->name("delete")->middleware('auth');
//******************************************************************************************** */

Route::get('/create-chapter', [chapterscontroller::class, 'createchapter'])->name('creerchapter')->middleware('auth');
Route::post('/create-chapter', [chapterscontroller::class, 'createchapterFeedback'])->name('creerchapter-Response')->middleware('auth');

Route::get('/{idmodule}/chapters', [chapterscontroller::class, 'listeschapter'])->name('chapters')->middleware('auth');
Route::delete('/deletechapter', [chapterscontroller::class, 'deletechapter'])->name("deletechapter")->middleware('auth');
//********************************************************************************************** */
Route::get('/create-cours', [courscontroller::class, 'createcours'])->name('creercours')->middleware('auth');
Route::post('/create-cours', [courscontroller::class, 'createcoursFeedback'])->name('creercours-Response')->middleware('auth');

Route::get('/{idchapitre}/cours', [courscontroller::class, 'listescours'])->name('cours')->middleware('auth');
Route::delete('/deletecours', [courscontroller::class, 'deletecours'])->name("deletecours")->middleware('auth');