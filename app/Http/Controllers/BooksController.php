<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Translation;
use App\Models\Language;
use Illuminate\Support\Facades\Date;
use DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        if(request()->has('search')){
            $search = request()->get('search');
            $books = Book::where('title', 'like', '%'.$search.'%')
                            ->orWhere('author', 'like', '%'.$search.'%')
                            ->orWhere('publisher', 'like', '%'.$search.'%')
                            ->get();
        }

        $genres = Genre::orderBy('name')->get();

        return view('books.index')->withBooks($books)->withGenres($genres);
    }

    public function filter(Request $request)
    {
        $selectedGenres = $request->input('genres');
        if(request()->has('all_genres')){$books = Book::all();}
        else{
        $books = Book::whereHas('genres', function ($query) use ($selectedGenres) {
            $query->whereIn('id', $selectedGenres);
        })->get();}
        $genres = Genre::all();
        return view('books.index', compact('books', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('books.create')->withGenres($genres);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentYear = Date::now()->year;

        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year_of_publication' => 'required|numeric|min:1800|max:'.$currentYear,
            'desscription' => 'nullable',
            'book_cover' => 'nullable|mimes:png,jpg,jpeg,webp'
        ]);

        if($request->has('book_cover')){
            $file = $request->file('book_cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'images/book_covers/';
            $file->move($path, $filename);
        }else {
            $filename = 'cs.png';
            $path = 'images/book_covers/';
        }

        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->publisher = $request->input('publisher');
        $book->year_of_publication = $request->input('year_of_publication');
        $book->book_cover = $path.$filename;
        $book->save();

        $selectedGenres = $request->input('selectedGenres');
        if (!empty($selectedGenres)) {
            $book->genres()->sync($selectedGenres);
        }

        if ($book->wasRecentlyCreated) {
            return redirect('/books')->with('success', 'Book Created');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to create book');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        return view('books.show')->withBook($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $curr_genres = DB::table('book_genre')
                    ->where('book_id', $book->id)->get()
                    ->pluck('genre_id')
                    ->toArray();
        $genres = Genre::all();

        return view('books.edit')->withBook($book)->withGenres($genres)->withCurrGenres($curr_genres);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $currentYear = Date::now()->year;

        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year_of_publication' => 'required|numeric|min:1800|max:'.$currentYear,
            'desscription' => 'nullable',
            'book_cover' => 'nullable|mimes:png,jpg,jpeg,webp'
        ]);

        $book = Book::find($id);

        if($request->has('book_cover')){
            $file = $request->file('book_cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'images/book_covers/';
            $file->move($path, $filename);
        }
        else{
            $path = $book->book_cover;
            $filename = '';
        }

        if(File::exists('book_cover')){
            File::delete($book->book_cover);
        }

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->publisher = $request->input('publisher');
        $book->year_of_publication = $request->input('year_of_publication');
        $book->book_cover = $path.$filename;
        $book->save();

        $book->genres()->detach();
        $selectedGenres = $request->input('selectedGenres');
        if (!empty($selectedGenres)) {
            $book->genres()->sync($selectedGenres);
        }

        if ($book->wasRecentlyCreated) {
            return response()->json(['success' => true, 'message' => 'Book updated successfully', 'book_cover' => asset($book->book_cover)]);
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update book');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if(File::exists($book->book_cover)){
            File::delete($book->book_cover);
        }
        $book->delete();

        return redirect('/books')->with('success', 'Book Removed');
    }
}
