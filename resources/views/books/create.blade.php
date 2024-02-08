@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\BooksController@store'], 'method' => 'POST']) !!}
    <div class="form-group ">
        {{Form::label('title','Title')}}
        <div>
            {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Harry Potter'])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::label('author','Author')}}
        {{Form::text('author','',['class' => 'form-control', 'placeholder' => 'J. K. Rowling'])}}
    </div>
    <div class="form-group">
        {{Form::label('publisher','Publisher')}}
        {{Form::text('publisher', '',['class' => 'form-control', 'placeholder' => 'Books LLC'])}}
    </div>
    <div class="form-group">
        {{Form::label('year_of_publication','Year of publication')}}
        {{Form::number('year_of_publication', '',['class' => 'form-control', 'placeholder' => '2008'])}}
    </div>
    <div class="form-group">
        {{Form::label('genre','Genre')}}
        {{Form::text('genre', '',['class' => 'form-control', 'placeholder' => 'fantasy'])}}
    </div>
    <div class="form-group">
        {{Form::label('book_cover','Book Cover')}}
        {{Form::text('book_cover', '',['class' => 'form-control', 'placeholder' => ''])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
