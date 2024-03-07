@extends('layouts.app')

@section('content')
<table class="table" id="editableTable">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">English</th>
        <th scope="col">Magyar</th>
        <th scope="col">Deutsch</th>
        <th scope="col"><i class="fa-solid fa-plus" id="addColumn"></i></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Title</th>
        <td>{{$book->title}}</td>
        <td class="editable" contenteditable="true">{{$titleTranslationHu ?? 'Nincs fordítás'}} </td>
        <td class="editable" contenteditable="true">{{$titleTranslationDe ?? 'Nincs fordítás'}} </td>
      </tr>
      <tr>
        <th scope="row">Description</th>
        <td>{{$book->description}}</td>
        <td class="editable" contenteditable="true">{{$descriptionTranslationHu ?? 'Nincs fordítás'}}</td>
        <td class="editable" contenteditable="true">{{$descriptionTranslationDe ?? 'Nincs fordítás'}}</td>
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
            var fieldName = $(this).closest('tr').find('th').eq(0).text().trim().toLowerCase(); // Get the field name from the first column header

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
    });
    </script>
@endsection
