<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\TranslationsController;

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

Route::get('/', 'App\Http\Controllers\BooksController@index');
Route::resource('books', BooksController::class);
Route::get('/filter-books', [BooksController::class, 'filter'])->name('filterBooks');
Route::get('/books/{id}/translate', [TranslationsController::class, 'translate']);
Route::post('/store-translations', [TranslationsController::class, 'storeTranslations']);
Route::post('/add-language', [TranslationsController::class, 'addLanguage']);
Route::post('/remove-language', [TranslationsController::class, 'removeLanguage']);

