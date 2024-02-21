<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Library') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="/books/create">Create Book</a>
                </li>
            </ul>
            {!! Form::open(['action' => ['App\Http\Controllers\BooksController@index'], 'method' => 'GET']) !!}
            <div class="d-flex">
                {{Form::text('search','' ,['class' => 'form-control w-100 d-flex-input', 'placeholder' => 'Search'])}}
                {{Form::submit('Submit', ['class' => 'btn btn-outline-success'])}}
            </div>
            {!! Form::close() !!}
            <div class="flags">
                <img class="flag" src="images/flags/hu_flag.jpg">
                <img class="flag" src="images/flags/en_flag.jpg">
            </div>
        </div>
    </div>
  </nav>
