@extends('layouts.app')

@section('content')
    <h1>{{$book->title}}</h1>
    <h3>{{$book->author}}</h3>
    <div  aria-label="Basic example">
        {!! Form::open(['action' => ['App\Http\Controllers\BooksController@destroy', $book->id], 'method' => 'POST']) !!}
                <a href="{{$book->id}}/edit" class="btn btn-secondary">Edit</a>
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this book?')"])}}
        {!! Form::close() !!}
    </div>
@endsection
