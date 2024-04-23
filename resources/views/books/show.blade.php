@extends('layouts.app')

@section('content')

    <h2>{{$book->title}}</h2>
    <h3>{{$book->author}}</h3>

     <div class="d-flex">
        <img class="show_image" src="{{asset($book->book_cover)}}">
        <div class="description">
            <h4>About the book</h4>
            <p>{{$book->description}}</p>
            <p>Publisher: {{$book->publisher}}</p>
            <p>Year of publication: {{$book->year_of_publication}}</p>
        </div>
     </div>
     <h6>Created at: {{$book->created_at}}</h6>
     <h6>Last update: {{$book->updated_at}}</h6>

    <div  aria-label="Basic example">
        {!! Form::open(['action' => ['App\Http\Controllers\BooksController@destroy', $book->id], 'method' => 'POST', 'id' => 'deleteForm']) !!}
                <a href="{{$book->id}}/edit" class="btn btn-outline-secondary">Edit</a>
                <a href="/api/books/{{$book->id}}/translate" class="btn btn-outline-primary">Translate</a>
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-outline-danger', 'onclick' => "confirmBookDelete(); return false;"])}}
        {!! Form::close() !!}
    </div>
    <a href="/" class="btn btn-outline-secondary btn-margin">Go Back</a>
@endsection
