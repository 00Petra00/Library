@extends('layouts.app')

@section('content')
<table class="table" id="editableTable">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">English</th>
        @foreach($languages as $language)
             <th scope="col">{{ ucfirst($language->language) }} <i class="fa-solid fa-minus removeColumn" ></i></th>
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
            @php
            $translationFound = false;
            @endphp
            @foreach($translations as $translation)
                @if($translation->language === $language->language && $translation->book_id === $book->id)
                    @if(!empty($translation->title_translation))
                        {{ $translation->title_translation }}
                        @php
                            $translationFound = true;
                        @endphp
                    @endif
                @endif
            @endforeach
            @if(!$translationFound)
                /
            @endif
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
                    @if(!empty($translation->description_translation))
                        {{ $translation->description_translation }}
                        @php
                            $translationFound = true;
                        @endphp
                    @endif
                @endif
            @endforeach
            @if(!$translationFound)
                /
            @endif
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
            url: '/api/store-translations',
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
                var capitalizedLanguage = newLanguage.charAt(0).toUpperCase() + newLanguage.slice(1);
                $('<th scope="col">' + capitalizedLanguage + '<i class="fa-solid fa-minus removeColumn" ></th>').insertBefore('#editableTable thead th:last');

                // Add empty editable cells
                $('#editableTable tbody tr').each(function() {
                    $(this).append('<td class="editable" contenteditable="true">/</td>');
                });

                $.ajax({
                    url: '/api/add-language',
                    type: 'POST',
                    data: {
                        newLanguageName: newLanguage,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('New language added successfully!');
                        console.log(response);
                        alert('New language added successfully');
                    },
                    error: function(xhr) {
                        console.error('Error adding new language:', xhr.responseText);
                        alert('Error adding new language');
                    }
                });
            }
        });

        $('.removeColumn').click(function() {
            var thElement = $(this).closest('th');
            var confirmDelete = confirm('Are you sure you want to delete this language?');
            if(confirmDelete){
                console.log("itt");
                    $.ajax({
                        url: '/api/remove-language',
                        type: 'POST',
                        data: {
                            language_id: {{$language->id}},
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log('Language removed successfully!');
                            console.log(response);
                            thElement.remove();
                            alert('Language removed successfully');
                        },
                        error: function(xhr) {
                            console.error('Error removing language:', xhr.responseText);
                            alert('Error removing language');
                        }
                    });
            }
        });
    });
    </script>
@endsection
