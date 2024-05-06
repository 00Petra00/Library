@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['id' => 'createForm', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
        {{Form::number('year_of_publication', '',['class' => 'form-control', 'placeholder' => '2008', 'min' => "1800"])}}
    </div>
    <div class="form-group">
        {{Form::label('genre','Genre')}}
        <select class="form-control" id="genres" name="selectedGenres[]" multiple="multiple">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{Form::label('book_cover','Book Cover')}}
        <div>
        <input type="file" name="book_cover" class="form-controler">
        </div>
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-outline-success btn-margin'])}}
    <a href="/" class="btn btn-outline-secondary btn-margin">Go Back</a>
{!! Form::close() !!}


<script>
    $(document).ready(function(){
        $('#genres').select2();
    });

    $('#createForm').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '{{ action('App\Http\Controllers\BooksController@store')}}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                let successTitle = 'Success';
                let successMessage = 'Book added successfully';
                $(document).trigger('showrModal', [successTitle, successMessage]);
                setTimeout(function() {
                window.location.href = '/books';
            }, 1800);
            },
            error: function(xhr, status, error) {
                let errorMessage = 'Failed to add book';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = '';
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorMessage += value ;
                    });
                }else if (xhr.statusText) {
                    errorMessage = xhr.statusText;
                }

                $(document).trigger('showrModal', ['Error', errorMessage, true]);
            }
        });
    });
</script>
@endsection
