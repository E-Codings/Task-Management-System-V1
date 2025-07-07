<div class="container">
    <h2>Create New Project</h2>
    <form action="{{ route('project.store') }}" method="POST">
        @csrf
        <div class="mb-2 col-6">
            <label for="Name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="Remark">Remark</label>
            <textarea name="remark" id="" cols="20" rows="4" class="form-control"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-primary ms-2">Save changes</button>
    </form>
</div>
