@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    {!! Form::open(['id' => 'updateForm', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
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
        {{Form::label('description','Description')}}
        {{Form::textarea('description', $book->description,['class' => 'form-control', 'placeholder' => 'About the book'])}}
    </div>
    <div class="form-group">
        {{Form::label('publisher','Publisher')}}
        {{Form::text('publisher', $book->publisher,['class' => 'form-control', 'placeholder' => 'Books LLC'])}}
    </div>
    <div class="form-group">
        {{Form::label('year_of_publication','Year of publication')}}
        {{Form::number('year_of_publication', $book->year_of_publication,['class' => 'form-control', 'placeholder' => '2008', 'min' => '1800'])}}
    </div>
    <div class="form-group">
        {{Form::label('genre','Genre')}}
        <select class="form-control" id="genres" name="selectedGenres[]" multiple="multiple">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}" {{ in_array($genre->id, $currGenres) ? 'selected' : '' }}>
                {{ $genre->name }}
            </option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        {{Form::label('book_cover','Book Cover')}}
        <div>
            <input type="file" name="book_cover" class="form-controler">
            <p>Current Image:</p>
            <img id="bookCover" class="image" src="{{asset($book->book_cover)}}" alt="Img">
        </div>
    </div>
    {{Form::submit('Save', ['class' => 'btn btn-outline-success btn-margin'])}}
    <a href="/books/{{$book->id}}" class="btn btn-outline-secondary btn-margin">Go Back</a>
{!! Form::close() !!}

<script>
    $(document).ready(function(){
        $('#genres').select2();
    });

    $(document).ready(function() {
    $('#updateForm').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: '{{ action('App\Http\Controllers\BooksController@update', $book->id) }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                let successTitle = 'Success';
                let successMessage = 'Book updated successfully';
                $(document).trigger('showrModal', [successTitle, successMessage]);

                var newBookCoverUrl = response.book_cover;
                $('#bookCover').attr('src', newBookCoverUrl);

            },
            error: function(xhr, status, error) {
                let errorTitle = 'Error';
                let errorMessage = 'Failed to update book';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = '';
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorMessage += value ;
                    });
                }else if (xhr.statusText) {
                    errorMessage = xhr.statusText;
                }

                $(document).trigger('showrModal', [errorTitle, errorMessage, true]);
            }
        });
    });
});
</script>
@endsection
