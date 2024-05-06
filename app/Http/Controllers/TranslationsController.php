<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Translation;
use App\Models\Language;
use DB;

class TranslationsController extends Controller
{
    public function translate(string $id){
        $book = Book::find($id);
        $languages = Language::all();
        $translations = Translation::all();

        $errors = null;
        return view('books.translate')->withBook($book)->withLanguages($languages)->withTranslations($translations)->withErrors($errors);
    }

    public function storeTranslations(Request $request){

        $fieldName = $request->input('field');
        $newText = $request->input('value');
        $language = $request->input('language');
        $book_id = $request->input('book_id');

        $translation = Translation::where('book_id', $book_id)
                                    ->where('language', $language)
                                    ->first();
        if(!$translation){
            $translation = new Translation;
            $default = true;
        }
        else{$default = false;}

        if($fieldName == 'title'){
            $translation->title_translation = $newText;
            if($default){
                $translation->description_translation = '';
            }
        }
        else{
            $translation->description_translation = $newText;
            if($default){
                $translation->title_translation = '';
            }
        }

        $translation->language = $language;
        $translation->book_id = $book_id;

        $saved = $translation->save();

        if($saved){
        return response()->json(['success' => true]);}

        App::abort(500, 'Error');
    }

    public function addLanguage(Request $request){

        $newLanguage = new Language();
        $newLanguage->language = $request->input('newLanguageName');
        $saved = $newLanguage->save();

        if($saved){
        return response()->json(['success' => true, 'languageId' => $newLanguage['id']]);}

        App::abort(500, 'Error');
    }

    public function removeLanguage(Request $request)
    {
        $language = Language::find($request->language_id);
        $deleted = $language->delete();

        if($deleted){
        return response()->json(['success' => true]);}

        App::abort(500, 'Error');
    }

}
