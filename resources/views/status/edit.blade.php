<form action="{{ route('status.update', $statusId->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- This is the key line -->
    <div class="mb-3">
        <label for="statusName" class="form-label">Name</label>
        <input type="text" class="form-control" id="statusName" name="name" value="{{ $statusId->name }}">
    </div>
    <div class="mb-3">
        <label for="statusRemark" class="form-label">Remark</label>
        <textarea class="form-control" id="statusRemark" name="remark">{{ $statusId->remark }}</textarea>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
</form>
