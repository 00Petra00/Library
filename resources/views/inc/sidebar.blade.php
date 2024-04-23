<form id="filterForm" method="GET" action="{{ route('filterBooks') }}">
    @csrf <!-- Laravelban az aláírás védelméhez -->
    <input type="checkbox" id="all_genres" name="all_genres" value="all" {{ in_array('all', $selectedGenres) && count($selectedGenres) == 1 ? 'checked' : '' }}>
    <label for="all_genre">All</label><br>
    @foreach($genres as $genre)
        <input type="checkbox" class="genre-checkbox" id="genre_{{ $genre->id }}" name="genres[]" value="{{ $genre->id }}" {{ in_array($genre->id, $selectedGenres) ? 'checked' : '' }}>
        <label for="genre_{{ $genre->id }}">{{ ucfirst($genre->name) }}</label><br>
    @endforeach
    <button class="btn btn-outline-success btn-margin" type="submit">Filter</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var allCheckbox = document.getElementById('all_genres');
        var checkboxes = document.querySelectorAll('.genre-checkbox');

        allCheckbox.addEventListener('change', function() {
        document.getElementById('filterForm').submit();
        });

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                if (allCheckbox.checked) {
                allCheckbox.checked = false;
            }
                document.getElementById('filterForm').submit();
            });
        });
    });
</script>
