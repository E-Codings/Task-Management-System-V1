<form action="{{ route('task.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="text" name="title" id="titleBasic" class="form-control" placeholder="Enter Title" />
                <label for="titleBasic">Title</label>
            </div>
        </div>

        <div class="col mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="text" name="duration" id="durationBasic" class="form-control" placeholder="Enter Duration" />
                <label for="durationBasic">Duration</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-6">
            <div class="form-floating form-floating-outline">
                <select name="project" id="projectBasic" class="form-select">
                    <option value="">Select Project</option>
                    @foreach ($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-6">
            <div class="form-floating form-floating-outline">
                <select name="status" id="statusBasic" class="form-select">
                    <option value="">Select Status</option>
                    @foreach ($statuss as $status)
                        <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-6">
            <label for="remarkBasic">Remark:</label>
            <textarea name="remark" id="remarkBasic" cols="60" rows="3" class="form-control" placeholder="Remark"></textarea>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ms-2">Create</button>
    </div>
</form>
