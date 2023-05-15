@extends('admin-dashboard.admin')

@section('content')
    <div class="d-flex flex-row align-items-center mb-3">
        <a class="btn d-flex flex-row align-items-center" id="menu-btn">
            <img src="/images/back-arrow.png" alt="" />
            <p class="m-0 p-0 font-nun fs-6 ms-2" id="page-title">
                Settings
            </p>
        </a>
    </div>

    <!-- small navigation -->
    <nav class="navigation this-box mb-3 d-none d-md-block settings-nav" style="background-color: #1e1e1e !important;">
        <ul class="font-nun small-nav">
            <li><a href="#settings_acc-set">Account Settings</a></li>
            <li><a href="#settings_registrar-staff">Registrar's Office Staff</a></li>
            <li><a href="#settings_homepage-content">Website Content</a></li>
        </ul>
    </nav>

    <div class="container my-5">
        <div id="settings_acc-set" class="font-nun">
            <!-- todo change pass -->
            <div class="d-flex flex-column" style="padding: 0 10%;">
                <div class="d-flex flex-row align-items-center" style="flex: 1;">
                    <h5 class="m-0 font-bold me-2">Change Password</h5>
                    <hr class="m-0" style="flex: 1;">
                </div>
                <!-- <form action=""> -->
                <div class="d-flex flex-column px-5 py-4">
                    <form action="">
                    <div class="mb-2 d-flex flex-row row align-items-center">
                        <div class="col-md-4">
                            <label for="update_admin_pass">Password</label>
                        </div>
                        <div class="col-md-5">
                            <input type="password" class="form-control settings-input" id="update_admin_pass" name="update_admin_pass" required>
                        </div>
                    </div>
                    <div class="mb-2 d-flex flex-row row align-items-center">
                        <div class="col-md-4">
                            <label for="update_retype_admin_pass">Re-type Password</label>
                        </div>
                        <div class="col-md-5">
                            <input type="password" class="form-control settings-input" id="update_retype_admin_pass" name="update_retype_admin_pass" required>
                        </div>
                    </div>
                    <div class="mt-2 d-flex flex-row justify-content-end">
                        <button class="btn w-auto settings-btn" type="submit" id="update_admin_pass_submit">
                            Save Changes
                        </button>
                    </div>
                    </form>
                </div>
                <div class="d-flex flex-row align-items-center" style="flex: 1;">
                    <h5 class="m-0 font-bold me-2">Contact Information</h5>
                    <hr class="m-0" style="flex: 1;">
                </div>
                <div class="d-flex flex-column px-5 py-4">
                    <form action="{{ route('admin-contacts-update', $admin_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2 d-flex flex-row row align-items-center">
                            <div class="col-md-4">
                                <label for="update_admin_email">Email</label>
                            </div>
                            <div class="col-md-5">
                                <input type="email" class="form-control settings-input" id="update_admin_email" name="update_admin_email" value="{{ $admin_email }}" required>
                            </div>
                        </div>
                        <div class="mb-2 d-flex flex-row row align-items-center">
                            <div class="col-md-4">
                                <label for="update_admin_cp_no">Cellphone Number</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control settings-input" id="update_admin_cp_no" name="update_admin_cp_no" value="{{ $admin_cell_no }}" required>
                            </div>
                        </div>
                        <div class="mt-2 d-flex flex-row justify-content-end">
                            <button class="btn w-auto settings-btn" type="submit" id="update_admin_contact_submit">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="settings_registrar-staff" class="font-nun">
            <div class="d-flex flex-column" style="padding: 0 10%;">
                <div class="d-flex flex-row align-items-center" style="flex: 1;">
                    <h5 class="m-0 font-bold me-2">Registrar's Office Staffs</h5>
                    <hr class="m-0" style="flex: 1;">
                </div>
                <div class="d-flex flex-row px-5 justify-content-end">
                    <button class="btn settings-btn d-flex flex-row align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#add_staff_container">
                        <div class="logo">
                            <img src="/images/add_white.png" alt="">
                        </div>
                        <small class="m-0 ms-2 p-0 font-nun">Add</small>
                    </button>
                </div>
                <!-- todo ========= add staff-->
                <div class="collapse" id="add_staff_container">
                    <div class="d-flex flex-column row px-5 py-4">
                        <form action="{{ route('add-staffs') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2 d-flex flex-row row align-items-center">
                                <div class="col-md-4">
                                    <label for="upload_staff_img">Profile Image</label>
                                </div>
                                <div class="col-md-5">
                                    <input class="form-control" id="upload_staff_img" name="add_staff_img" type="file" accept=".jpg,.png,.jpeg,.svg" required>
                                </div>
                            </div>
                            <div class="mb-2 d-flex flex-row row align-items-center">
                                <div class="col-md-4">
                                    <label for="add_staff_name">Full Name</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control settings-input" id="add_staff_name" name="add_staff_name" required>
                                </div>
                            </div>
                            <div class="mb-2 d-flex flex-row row align-items-center">
                                <div class="col-md-4">
                                    <label for="add_staff_position">Position</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control settings-input" id="add_staff_position" name="add_staff_position" required>
                                </div>
                            </div>
                            <div class="mt-2 d-flex flex-row justify-content-end">
                                <button class="btn w-auto settings-btn" type="submit" id="add_admin_staff_submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- todo displaying staff -->
                @foreach($staffs as $staff)
                <div class="d-flex flex-row px-5 py-4 flex-wrap">
                    <div class="settings-prof-img me-4">
                        <img src="{{ url('').'/'.$staff->profile_image }}" alt="Profile Staff">
                    </div>
                    <div class="d-flex flex-column justify-content-end mt-2" style="flex: 1;">
                        <p class="font-bold m-0">{{ $staff->full_name }}</p>
                        <p class="m-0 mb-2">{{ $staff->position }}</p>
                        <div class="d-flex flex-row justify-content-start flex-wrap ">
                            <button class="btn settings-btn-white d-flex flex-row align-items-center me-2" data-bs-toggle="collapse" data-bs-target="#edit_staff-{{ $staff->id }}" type="button">
                                <img src="/images/edit.png" alt="">
                                <small class="m-0 ms-2 p-0 font-nun">Edit</small>
                            </button>
                            <button class="btn settings-btn-white d-flex flex-row align-items-center" data-bs-toggle="collapse" data-bs-target="#delete_staff-{{ $staff->id }}" type="button">
                                <img src="/images/delete.png" alt="">
                            <small class="m-0 ms-2 p-0 font-nun">Delete</small>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- todo edit staff -->
                <div id="edit_staff-{{ $staff->id }}" class="collapse">
                    <div class="d-flex flex-column row px-5 py-4">
                        <form action="{{ route('edit-staffs', $staff->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-2 d-flex flex-row row align-items-center">
                                <div class="col-md-4">
                                    <label for="update_staff_img">Profile Image</label>
                                </div>
                                <div class="col-md-5">
                                    <input class="form-control" id="update_staff_img" name="update_staff_img" type="file" accept=".jpg,.png,.jpeg,.svg">
                                </div>
                            </div>
                            <div class="mb-2 d-flex flex-row row align-items-center">
                                <div class="col-md-4">
                                    <label for="update_staff_name">Full Name</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control settings-input" id="update_staff_name" name="update_staff_name" value="{{ $staff->full_name }}">
                                </div>
                            </div>
                            <div class="mb-2 d-flex flex-row row align-items-center">
                                <div class="col-md-4">
                                    <label for="update_staff_position">Position</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control settings-input" id="update_staff_position" name="update_staff_position" value="{{ $staff->position }}">
                                </div>
                            </div>
                            <div class="mt-2 d-flex flex-row justify-content-end">
                                <button class="btn w-auto settings-btn" type="submit" id="update_admin_staff_submit">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- todo delete staff -->
                <div id="delete_staff-{{ $staff->id }}" class="collapse">
                    <div class="d-flex flex-column row px-5 py-4">
                        <form action="{{ route('delete-staffs', $staff->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="mb-2 d-flex flex-row row justify-content-center">
                                Are you sure you want to remove this personnel information?
                            </div>
                            <div class="mt-2 d-flex flex-row justify-content-end">
                                <button class="btn w-auto settings-btn" type="submit" id="delete_admin_staff_submit">
                                    Delete
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="settings_homepage-content" class="font-nun">
            <div class="d-flex flex-column" style="padding: 0 10%;">
                <div class="d-flex flex-row align-items-center" style="flex: 1;">
                    <h5 class="m-0 font-bold me-2">Website Content</h5>
                    <hr class="m-0" style="flex: 1;">
                </div>
                <div class="d-flex flex-column px-5 py-4">
                    <h5 class="font-bold">Website Main Cover</h5>
                    <div class="d-flex flex-row flex-wrap">
                        <div class="settings-web-img me-4">
                            <img src="/images/registrar01.jpg" alt="homepage cover">
                        </div>
                        <div class="d-flex flex-column justify-content-end" style="flex: 1;">
                            <small class="p-0 m-0 mb-3 w-75"><i>
                                For optimal image quality, we recommend using or uploading images with a minimum size of 1920 x 1080 pixels for better resolution.
                            </i></small>
                            <div class="d-flex flex-row justify-content-start flex-wrap">
                                <div class="mb-2 d-flex flex-row align-items-center">
                                    <input class="form-control" id="upload_staff_img" type="file" accept=".jpg,.png,.jpeg,.svg" required>
                                </div>
                            </div>
                            <div class="mt-2 d-flex flex-row justify-content-start">
                                <button class="btn w-auto settings-btn" type="submit" id="add_admin_staff_submit">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column px-5 py-4">
                    <h5 class="font-bold">FAQ and Announcement Page Header Cover</h5>
                    <div class="d-flex flex-row flex-wrap">
                        <div class="settings-web-img me-4">
                            <img src="/images/registrar.png" alt="homepage cover">
                        </div>
                        <div class="d-flex flex-column justify-content-end" style="flex: 1;">
                            <small class="p-0 m-0 mb-3 w-75"><i>
                                For optimal image quality, we recommend using or uploading images with a minimum size of 1920 x 1080 pixels for better resolution.
                            </i></small>
                            <div class="d-flex flex-row justify-content-start flex-wrap">
                                <div class="mb-2 d-flex flex-row align-items-center">
                                    <input class="form-control" id="upload_staff_img" type="file" accept=".jpg,.png,.jpeg,.svg" required>
                                </div>
                            </div>
                            <div class="mt-2 d-flex flex-row justify-content-start">
                                <button class="btn w-auto settings-btn" type="submit" id="add_admin_staff_submit">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column px-5 py-4">
                    <h5 class="font-bold">About Section Image</h5>
                    <div class="d-flex flex-row flex-wrap">
                        <div class="settings-web-img me-4">
                            <img src="/images/registrar02.jpg" alt="homepage cover">
                        </div>
                        <div class="d-flex flex-column justify-content-end" style="flex: 1;">
                            <small class="p-0 m-0 mb-3 w-75"><i>
                                For optimal image quality, we recommend using or uploading images with a minimum size of 1920 x 1080 pixels for better resolution.
                            </i></small>
                            <div class="d-flex flex-row justify-content-start flex-wrap">
                                <div class="mb-2 d-flex flex-row align-items-center">
                                    <input class="form-control" id="upload_staff_img" type="file" accept=".jpg,.png,.jpeg,.svg" required>
                                </div>
                            </div>
                            <div class="mt-2 d-flex flex-row justify-content-start">
                                <button class="btn w-auto settings-btn" type="submit" id="add_admin_staff_submit">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <button id="back-to-top-btn" class="btn btn-custom show" style="color: #131313;">Back to top</button>
@endsection