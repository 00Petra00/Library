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
