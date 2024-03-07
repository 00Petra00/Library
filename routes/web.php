<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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
Route::get('/books/{id}/translate', [BooksController::class, 'translate']);
Route::post('/store-translations', [BooksController::class, 'storeTranslations']);
Route::post('/add-language', [BooksController::class, 'addLanguage']);
