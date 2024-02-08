@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome To Library</h1>

    @if (count($books) > 0)
        @foreach ($books as $book)
            <h3><a href="/books/{{$book->id}}">{{$book->title}}</a></h3>
        @endforeach

    @endif
</div>
@endsection
