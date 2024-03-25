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
    <div class="modal-dialog">
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
    $(document).on('showrModal', function(event, title, message, error = false) {
    $('#modal .modal-title').text(title);
    $('#modal .modal-body').text(message);
    if (error) {
        $('#modal .modal-footer .btn-secondary').addClass('btn-danger');
    }
    else{
        console.log("itt")
        $('#modal .modal-footer .btn-secondary').addClass('btn-success');
    }
    $('#modal').modal('show');
    });

    function showDeleteModal() {
    $('#deleteModal').modal('show');

    $('#confirmDelete').on('click', function() {

        $('#deleteModal').modal('hide');
    });
}
</script>
