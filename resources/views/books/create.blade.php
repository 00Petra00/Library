@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\BooksController@store'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
        {{Form::label('description','Description')}}
        {{Form::textarea('description', '',['class' => 'form-control', 'placeholder' => 'About the book'])}}
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
        {{-- {{Form::text('genre', '',['class' => 'form-control', 'placeholder' => 'fantasy'])}} --}}
        <select class="form-control" id="genres" name="selectedGenres[]" multiple="multiple">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{Form::label('book_cover','Book Cover')}}
        {{-- {{Form::file('book_cover', '',['class' => 'form-control'])}} --}}
        <div>
        <input type="file" name="book_cover" class="form-controler">
        </div>
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-outline-success btn-margin'])}}
{!! Form::close() !!}

<script>
    $(document).ready(function(){
        $('#genres').select2();
    });
</script>
@endsection
