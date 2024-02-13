@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome To Library</h1>

    <form method="GET" action="{{ route('filterBooks') }}">
        @csrf <!-- Laravelban az aláírás védelméhez -->
        @foreach($genres as $genre)
            <input type="checkbox" id="genre_{{ $genre->id }}" name="genres[]" value="{{ $genre->id }}">
            <label for="genre_{{ $genre->id }}">{{ $genre->name }}</label><br>
        @endforeach
        <button type="submit">Filter</button>
    </form>
    @if (count($books) > 0)
        @foreach ($books as $book)
            <h3><a href="/books/{{$book->id}}">{{$book->title}}</a></h3>
            <img src="{{asset($book->book_cover)}}" style="height: 100px", alt="Img">
        @endforeach

    @endif
</div>
@endsection
