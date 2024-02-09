@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\BooksController@update', $book->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group ">
        {{Form::label('title','Title')}}
        <div>
            {{Form::text('title', $book->title,['class' => 'form-control', 'placeholder' => 'Harry Potter'])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::label('author','Author')}}
        {{Form::text('author', $book->author,['class' => 'form-control', 'placeholder' => 'J. K. Rowling'])}}
    </div>
    <div class="form-group">
        {{Form::label('publisher','Publisher')}}
        {{Form::text('publisher', $book->publisher,['class' => 'form-control', 'placeholder' => 'Books LLC'])}}
    </div>
    <div class="form-group">
        {{Form::label('year_of_publication','Year of publication')}}
        {{Form::number('year_of_publication', $book->year_of_publication,['class' => 'form-control', 'placeholder' => '2008'])}}
    </div>
    <div class="form-group">
        {{Form::label('genre','Genre')}}
        {{Form::text('genre', $book->genre,['class' => 'form-control', 'placeholder' => 'fantasy'])}}
    </div>
    <div class="form-group">
        {{Form::label('book_cover','Book Cover')}}
        {{-- {{Form::text('book_cover', $book->book_cover,['class' => 'form-control', 'placeholder' => ''])}} --}}
        <div>
            <input type="file"  name="book_cover" class="form-controler">
        </div>
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    <a href="/books/{{$book->id}}" class="btn btn-secondary">Go Back</a>
{!! Form::close() !!}
@endsection
