<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index')->withBooks($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required'
        ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher') ?? '';
        $book->year_of_publication = $request->input('year_of_publication') ?? '2000';
        $book->genre = $request->input('genre') ?? '';
        $book->book_cover = $request->input('book_cover') ?? '';
        $book->save();

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
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher') ?? '';
        $book->year_of_publication = $request->input('year_of_publication') ?? '2000';
        $book->genre = $request->input('genre') ?? '';
        $book->book_cover = $request->input('book_cover') ?? '';
        $book->save();

        return redirect('/books')->with('success', 'Book Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book Removed');
    }
}
