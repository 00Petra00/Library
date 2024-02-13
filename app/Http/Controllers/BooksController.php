<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Book;
use App\Models\Genre;

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
            //return $books;
        }

        return view('books.index')->withBooks($books);
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
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'book_cover' => 'nullable|mimes:png,jpg,jpeg,webp'
        ]);

        if($request->has('book_cover')){
            $file = $request->file('book_cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'images/book_covers/';
            $file->move($path, $filename);
        }


        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher') ?? '';
        $book->year_of_publication = $request->input('year_of_publication') ?? '2000';
        $book->book_cover = $path.$filename;
        $book->save();

        $selectedGenres = $request->input('selectedGenres');
        if (!empty($selectedGenres)) {
            foreach ($selectedGenres as $genreId) {
                $genre = Genre::find($genreId);
                if ($genre) {
                    $book->genres()->attach($genreId);
                }
            }
        }

        return redirect('/books')->with('success', 'Book Created');
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

        return view('books.edit')->withBook($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'book_cover' => 'nullable|mimes:png,jpg,jpeg,webp'
        ]);

        if($request->has('book_cover')){
            $file = $request->file('book_cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'images/book_covers/';
            $file->move($path, $filename);
        }

        $book = Book::find($id);

        if(File::exists($book->book_cover)){
            File::delete($book->book_cover);
        }

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher') ?? '';
        $book->year_of_publication = $request->input('year_of_publication') ?? '2000';
        $book->genre = $request->input('genre') ?? '';
        $book->book_cover = $path.$filename;
        $book->save();

        return redirect('/books')->with('success', 'Book Updated');

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
