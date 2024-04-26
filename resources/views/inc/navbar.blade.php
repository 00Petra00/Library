<nav class="navbar navbar-light bg-light">
    <div class="container">
        <div class="d-flex navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Library') }}
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="/books/create">Create Book</a>
                </li>
            </ul>
            @if(request()->is('/') || request()->is('filter-books') || (request()->is('books') && request()->has('search')) || request()->is('books') )
            {!! Form::open(['action' => ['App\Http\Controllers\BooksController@index'], 'method' => 'GET']) !!}
            <div class="d-flex">
                {{Form::text('search','' ,['class' => 'form-control d-flex-input', 'placeholder' => 'Search books, authors, publishers'])}}
                {{Form::submit('Submit', ['class' => 'btn btn-outline-success'])}}
            </div>
            {!! Form::close() !!}
            @endif
        </div>
    </div>
  </nav>
