<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete it?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" id="confirmDelete" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    var successMessage = "{{ session('success') }}";
    var errorMessage = "{{ session('error') }}";

    if (successMessage) {
        $('.modal-title').text('Success');
        $('.modal-body').text(successMessage);

        $('#modal').modal('show');
    }
    else if (errorMessage) {
        $('.modal-title').text('Error');
        $('.modal-body').text(errorMessage);

        $('#deleteModal').modal('show');
    }
    });

    $(document).on('showrModal', function(event, title, message, error = false) {
        $('#modal .modal-title').text(title);
        $('#modal .modal-body').text(message);
        if (error) {
            $('#modal .modal-footer .btn-secondary').addClass('btn-danger');
            $('#modal .modal-footer .btn-secondary').removeClass('btn-success');
        }
        else{
            $('#modal .modal-footer .btn-secondary').addClass('btn-success');
            $('#modal .modal-footer .btn-secondary').removeClass('btn-danger');
        }
        $('#modal').modal('show');
    });

    function confirmBookDelete() {
        $('#deleteModal').modal('show');
        $('#confirmDelete').on('click', function() {
            $('#deleteModal').modal('hide');
            $('#deleteForm').submit();
        });
    }

    function confirmLanguageDelete(languageId, columnIndex) {
    $('#deleteModal').modal('show');

    function handleConfirmClick() {
        $.ajax({
            url: '/api/remove-language',
            type: 'POST',
            data: {
                language_id: languageId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('table').find('tr').each(function() {
                    $(this).find('th, td').eq(columnIndex).remove();
                });
                //thElement.remove();
                let successTitle = 'Success';
                let successMessage = 'Language removed successfully';
                $(document).trigger('showrModal', [successTitle, successMessage]);
            },
            error: function(xhr) {
                let errorTitle = 'Error';
                let errorMessage = 'Error removing language';
                $(document).trigger('showrModal', [errorTitle, errorMessage, true]);
            }
        });

        $('#deleteModal').modal('hide');
        $('#confirmDelete').off('click', handleConfirmClick);
    }
    $('#confirmDelete').off('click', handleConfirmClick);
    $('#confirmDelete').on('click', handleConfirmClick);
}

</script>
