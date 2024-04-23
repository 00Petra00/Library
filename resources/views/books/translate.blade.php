@extends('layouts.app')

@section('content')
<table class="table" id="editableTable">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">English</th>
        @foreach($languages as $language)
             <th scope="col">{{ ucfirst($language->language) }} <i class="fa-solid fa-minus removeColumn" data-language-id="{{$language->id}}"></i></th>
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
            @php
            $translationFound = false;
            @endphp
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
                let successTitle = 'Success';
                let successMessage = 'Translation saved successfully';
                $(document).trigger('showrModal', [successTitle, successMessage]);
            },
            error: function(xhr) {
                let errorTitle = 'Error';
                let errorMessage = 'Error saving translation';
                $(document).trigger('showrModal', [errorTitle, errorMessage, true]);
            }
            });
        });

        $('#addColumn').click(function() {
            var newLanguage = prompt('Enter the new language:');
            if (!newLanguage) {
                return;
            }



            $.ajax({
                url: '/api/add-language',
                type: 'POST',
                data: {
                    newLanguageName: newLanguage,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Add column header
                    const languageId = response.languageId;
                    var capitalizedLanguage = newLanguage.charAt(0).toUpperCase() + newLanguage.slice(1);
                    $('<th scope="col">' + capitalizedLanguage + '<i class="fa-solid fa-minus removeColumn" data-language-id="'+languageId+'"></th>').insertBefore('#editableTable thead th:last');

                    // Add empty editable cells
                    $('#editableTable tbody tr').each(function() {
                        $(this).append('<td class="editable" contenteditable="true">/</td>');
                    });
                    console.log('Add language response',JSON.stringify(response, null, 4));
                    let successTitle = 'Success';
                    let successMessage = 'New language added successfully';
                    $(document).trigger('showrModal', [successTitle, successMessage]);
                },
                error: function(xhr) {
                    let errorTitle = 'Error';
                    let errorMessage = 'Error adding new language';
                    $(document).trigger('showrModal', [errorTitle, errorMessage, true]);
                }
            });
        });

        $(document).on('click', '.removeColumn', function() {
            var thElement = $(this).closest('th');
            var languageId = $(this).data('language-id');
            console.log('thElement',JSON.stringify(thElement, null, 4));
            console.log('$(this).data',JSON.stringify($(this).data, null, 4));
            var columnIndex = thElement.index();
            console.log('columnIndex', columnIndex);
            confirmLanguageDelete(languageId, columnIndex);
        });
    });
    </script>
@endsection
