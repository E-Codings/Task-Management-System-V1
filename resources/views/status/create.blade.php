<form action="{{ route('status.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="statusName" class="form-label">Name</label>
        <input type="text" class="form-control" id="statusName" name="name">
    </div>
    <div class="mb-3">
        <label for="statusRemark" class="form-label">Remark</label>
        <textarea class="form-control tinymce" id="statusRemark" name="remark"></textarea>
    </div>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-primary ms-2">Save</button>
    </div>
</form>
