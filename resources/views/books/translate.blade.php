@extends('layouts.app')

@section('content')
<table class="table" id="editableTable">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">English</th>
        @foreach($languages as $language)
             <th scope="col">{{ ucfirst($language->language) }}</th>
         @endforeach
        <th scope="col"><i class="fa-solid fa-plus" id="addColumn"></i></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Title</th>
        <td>{{$book->title}}</td>
        @foreach($languages as $language)
        <td class="editable" contenteditable="true">
            @foreach($translations as $translation)
                @if($translation->language === $language->language && $translation->book_id === $book->id)
                        {{ $translation->title_translation }}
                @endif
            @endforeach
        </td>
        @endforeach
      </tr>
      <tr>
        <th scope="row">Description</th>
        <td>{{$book->description}}</td>
        @foreach($languages as $language)
        <td class="editable" contenteditable="true">
            @foreach($translations as $translation)
                @if($translation->language === $language->language && $translation->book_id === $book->id)
                        {{ $translation->description_translation }}
                @endif
            @endforeach
        </td>
        @endforeach
      </tr>
    </tbody>
  </table>
  <a href="/books/{{$book->id}}" class="btn btn-outline-secondary btn-margin">Go Back</a>
  <script>
    $(document).ready(function() {
        $('#editableTable td.editable').on('blur', function() {
            var newText = $(this).text();
            var cellId = $(this).closest('tr').index() + '-' + $(this).index();
            var secondTh = $('#editableTable thead th').eq($(this).index());
            var language = secondTh.text().trim().toLowerCase();
            var bookId = {{ $book->id }};
            var fieldName = $(this).closest('tr').find('th').eq(0).text().trim().toLowerCase();

            console.log('Új érték: ' + newText + ', Cella azonosító: ' + cellId);
            console.log('NYelv: ' + language);
            console.log(fieldName);

            $.ajax({
            url: '/store-translations',
            type: 'POST',
            data: {
                language: language,
                field: fieldName,
                value: newText,
                book_id: bookId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Translation saved successfully!');
                console.log(response);
            },
            error: function(xhr) {
                console.error('Error saving translation:', xhr.responseText);
            }
            });
        });

        $('#addColumn').click(function() {
            var newLanguage = prompt('Enter the new language:');
            if (newLanguage) {
                // Add column header
                $('<th scope="col">' + newLanguage + '</th>').insertBefore('#editableTable thead th:last');

                // Add empty editable cells
                $('#editableTable tbody tr').each(function() {
                    $(this).append('<td class="editable" contenteditable="true">Nincs fordítás</td>');
                });

                $.ajax({
                    url: '/add-language',
                    type: 'POST',
                    data: {
                        newLanguageName: newLanguage,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('New language added successfully!');
                        console.log(response);
                    },
                    error: function(xhr) {
                        console.error('Error adding new language:', xhr.responseText);
                    }
                });
            }
        });
    });
    </script>
@endsection
