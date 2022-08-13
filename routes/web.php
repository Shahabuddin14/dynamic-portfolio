<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/cv/download', [FrontendController::class, 'downloadCV'])->name('cv.download');
Route::post('/contacts',[FrontendController::class, 'saveContacts']);
Route::get('/portfolio/{slug}', [FrontendController::class, 'singlePortfolio']);
Route::get('/blog/{slug}', [FrontendController::class, 'singleBlog']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[FrontendController::class, 'adminHome'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/about', [AboutController::class, 'about'])->name('admin.about');
Route::middleware(['auth:sanctum', 'verified'])->get('/about/edit', [AboutController::class, 'aboutEdit'])->name('admin.about.edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/update-about', [AboutController::class, 'updateAbout']);
Route::middleware(['auth:sanctum', 'verified'])->resource('/services', ServiceController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('/portfolio', PortfolioController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('/skill', SkillController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('/social', SocialController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('/reviews', ReviewController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('/partner', PartnerController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('/blog-list', BlogController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/contact-list',[FrontendController::class, 'contactList'])->name('contact-list');
Route::middleware(['auth:sanctum', 'verified'])->get('/contact-list-remove/{id}',[FrontendController::class, 'contactListRemove']);
