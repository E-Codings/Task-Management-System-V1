{{-- Model --}}
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="createStatusModalLabel">Create New Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="statusName" class="form-label">Name</label>
                <input type="text" class="form-control" id="statusName" name="name">
            </div>
            <div class="mb-3">
                <label for="statusRemark" class="form-label">Remark</label>
                <textarea class="form-control" id="statusRemark" name="remark"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
