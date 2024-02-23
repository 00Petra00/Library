@extends('layouts.app')

@section('aside')
<aside>
    <form method="GET" action="{{ route('filterBooks') }}">
        @csrf <!-- Laravelban az aláírás védelméhez -->
        <input type="checkbox" id="all_genres" name="all_genres" value="all">
        <label for="all_genre">all</label><br>
        @foreach($genres as $genre)
            <input type="checkbox" id="genre_{{ $genre->id }}" name="genres[]" value="{{ $genre->id }}">
            <label for="genre_{{ $genre->id }}">{{ $genre->name }}</label><br>
        @endforeach
        <button class="btn btn-outline-success btn-margin" type="submit">Filter</button>
    </form>
</aside>
@endsection
@section('content')
<div class="jumbotron text-center">
    <h1 class="title">Library</h1>

    @if (count($books) > 0)
    <div class="row">
        @foreach ($books as $book)
        <div class="col-sm pointer" onclick="window.location.href = '/books/{{$book->id}}';">
            <a href="/books/{{$book->id}}"><img class="image" src="{{asset($book->book_cover)}}" alt="Img"></a>
            <h5>{{$book->title}}</h5>
            <h6>{{$book->author}}</h6>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
