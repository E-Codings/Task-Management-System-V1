<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6 mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" />
                <label for="first_name">First Name</label>
            </div>
        </div>
        <div class="col-6 mb-6 mt-2">
            <div class="form-floating form-floating-outline">
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Last Name" />
                <label for="last_name">Last Name</label>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <label for="gender">Gender: </label>
        <div class="d-flex my-2">
            <div class="me-2">
                <input type="radio" value="male" name="gender" id="male">
                <label for="male">Male</label>
            </div>
            <div class="me-2">
                <input type="radio" value="female" name="gender" id="female">
                <label for="female">Female</label>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="email" name="email" id="email" class="form-control" placeholder="*****@***" />
                <label for="email">Email</label>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col mb-2">
            <div class="form-floating form-floating-outline">
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" />
                <label for="password">Password</label>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col mb-2">
            <label for="first_name">Profile: </label>
            <input type="file" name="profile" class="form-control" id="profile">
            <input type="hidden" name="profile_name" class="form-control my-2 " id="profile_name">
            <div class="preview-profile border border-1 border-dark mt-2" style="width: fit-content; cursor: pointer;">
                <img  src="{{ asset('assets/img/imgs/Upload-Icon.png') }}" id="show-profile" alt=""  style="width:150px">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> Close </button>
        <button type="submit" class="btn btn-primary ms-2">Create</button>
    </div>
</form>

