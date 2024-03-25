@extends('layouts.app')

@section('aside')
<aside class=" aside d-none d-lg-block">
    @include('inc.sidebar')
</aside>
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title">Filters</h3>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="aside offcanvas-body">
        @include('inc.sidebar')
    </div>
</div>

<button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
    <i class="fa-solid fa-circle-arrow-right fa-lg"></i>
</button>
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
