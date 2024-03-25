<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\TranslationsController;

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
Route::get('/books/{id}/translate', [TranslationsController::class, 'translate']);
Route::post('/store-translations', [TranslationsController::class, 'storeTranslations']);
Route::post('/add-language', [TranslationsController::class, 'addLanguage']);
Route::post('/remove-language', [TranslationsController::class, 'removeLanguage']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

