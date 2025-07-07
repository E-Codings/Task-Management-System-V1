<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="createStatusModalLabel">Delete Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('destroy', $deleteId->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <div class="modal-body">
            <div class="mb-3">
                <label for="statusName" class="form-label">Name</label>
                <input type="text" class="form-control" id="statusName" name="name" value="{{ $deleteId->name }}">
            </div>
            <div class="mb-3">
                <label for="statusRemark" class="form-label">Remark</label>
                <textarea class="form-control" id="statusRemark" name="remark">{{ $deleteId->remark }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
</div>
