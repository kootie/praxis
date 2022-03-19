<?php

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
Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::get('/services', [App\Http\Controllers\PagesController::class, 'services'])->name('services');

Auth::routes();

//Route::get('/jobs/{categor_id}', [App\Http\Controllers\JobsController::class, 'show'])->name('jobs');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('categories', 'CategoriesController');
Route::resource('jobs', 'JobsController');
Route::resource('posts', 'PostsController');
Route::resource('items', 'ItemsController');
//Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories');
//Route::get('/jobs', [App\Http\Controllers\JobsController::class, 'index'])->name('jobs');
Route::get('/jobsearch', [App\Http\Controllers\JobsearchController::class, 'index'])->name('jobsearch');
Route::post('/favourites/add', [App\Http\Controllers\FavouritesController::class, 'addFavourite'])->name('Favourites');

Route::post('/threads/create', [App\Http\Controllers\ThreadsController::class, 'createThread'])->name('Threads');
Route::post('/threads/{id}', [App\Http\Controllers\ThreadsController::class, 'showThread'])->name('Threads');

Route::post('/threads/{id}/newmessage', [App\Http\Controllers\ThreadsController::class, 'createMessage'])->name('Message');
