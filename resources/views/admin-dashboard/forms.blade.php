@extends('admin-dashboard.admin')

@section('content')
    <!-- header -->
    <div class="d-flex flex-row align-items-center mb-3">
        <a class="btn d-flex flex-row align-items-center" id="menu-btn">
            <img src="/images/back-arrow.png" alt="" />
            <p class="m-0 p-0 font-nun fs-6 ms-2" id="page-title">
                Forms Configuration
            </p>
        </a>
    </div>

    <!-- small navigation -->
    <!-- TODO forms content -->

    <div class="d-flex flex-column">
        <nav class="navigation this-box">
            <ul class="font-nun small-nav">
            <li><a href="#forms">Forms</a></li>
            <li><a href="#courses">Courses</a></li>
            </ul>
        </nav>

        <!-- fix sectionf forms -->
            <section id="forms" class="mt-4 mb-2">
            <div id="forms-head" class="w-100 px-5 d-flex flex-row justify-content-between align-items-center">
                <div class="title font-nun font-bold fs-3">Forms</div>
                <button class="btn btn-custom d-flex flex-row align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#addFormModal">
                    <div class="logo">
                        <img src="/images/add.png" alt="">
                    </div>
                    <small class="m-0 ms-2 p-0 font-nun">Add</small>
                </button>
            </div>
            <div id="forms-body" class="this-box mt-2">
                <div class="accordion" id="forms-list">
                @foreach ($forms as $form)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $form->id }}" aria-expanded="false" aria-controls="1">
                            <!-- Issuance of Transcript of Records (TOR) -->   {{ $form->name }}
                            </button>
                        </h2>
                        <div id="{{ $form->id }}" class="accordion-collapse collapse" data-bs-parent="#forms-list">
                            <div class="accordion-body d-flex flex-column">
                                <div class="body-content">
                                    <div class="row w-100 p-0 my-2">
                                        <div class="col-md-6">
                                            <p class="info-title">Availability of the Service</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="info-content"> {{ $form->form_avail }}</p>
                                        </div>
                                    </div>
                                    <hr class="font-88">
                                    <div class="row w-100 p-0 my-2">
                                        <div class="col-md-6">
                                            <p class="info-title">Who May Avail the Service</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="info-content"> {{ $form->form_who_avail }}</p>
                                        </div>
                                    </div>
                                    <hr class="font-88">
                                    <div class="row w-100 p-0 my-2">
                                        <div class="col-md-6">
                                            <p class="info-title">What Are the Requirements</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="info-content">{{ $form->form_requirements }}</p>
                                        </div>
                                    </div>
                                    <hr class="font-88">
                                    <div class="row w-100 p-0 my-2">
                                        <div class="col-md-6">
                                            <p class="info-title">Complete Processing Time: </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="info-content">{{ $form->form_process }}</p>
                                        </div>
                                    </div>
                                    <hr class="font-88">
                                    <div class="row w-100 p-0 my-2">
                                        <div class="col-md-6">
                                            <p class="info-title">Document Fee: </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="info-content">{{ $form->fee }}</p>
                                        </div>
                                    </div>
                                    <hr class="font-88">
                                    <div class="row w-100 p-0 my-2">
                                        <div class="col-md-6">
                                            <p class="info-title">Maximum Time to Claim</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="info-content"> {{ $form->form_max_time }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="body-buttons d-flex flex-row justify-content-end mt-2">
                                    <button class="btn btn-custom d-flex flex-row align-items-center open_edit_form_modal" type="button" data-form-edit-id="{{ $form->id }}">
                                        <img src="/images/edit.png" alt="">
                                        <small class="m-0 ms-2 p-0 font-nun">Edit</small>
                                    </button>
                                    
                                    <button class="btn btn-custom d-flex flex-row align-items-center open_delete_form_modal" type="button" data-form-delete-id="{{ $form->id }}" data-form-delete-name="{{ $form->name }}">
                                        <img src="/images/delete.png" alt="">
                                    <small class="m-0 ms-2 p-0 font-nun">Delete</small>
                                </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </section>
        
        
        <!-- fix section courses -->
        <section id="courses" class="mt-2 mb-2">
            <div id="forms-head" class="w-100 px-5 d-flex flex-row justify-content-between align-items-center">
                <div class="title font-nun font-bold fs-3">Courses</div>
                <button class="btn btn-custom d-flex flex-row align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    <div class="logo">
                        <img src="/images/add.png" alt="">
                    </div>
                    <small class="m-0 ms-2 p-0 font-nun">Add</small>
                </button>
            </div>
            <div id="forms-body" class="this-box mt-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex flex-row justify-content-between align-items-center">
                        <p class="m-0 p-0">Bachelor of Science in Computer Science</p>
                        <div class="body-buttons d-flex flex-row justify-content-end align-items-center">
                            <button class="btn btn-custom d-flex flex-row align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                                <img src="/images/edit.png" alt="">
                                <small class="m-0 ms-2 p-0 font-nun d-none d-md-flex">Edit</small>
                            </button>
                            <button class="btn btn-custom d-flex flex-row align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#deleteCourseModal">
                                <img src="/images/delete.png" alt="">
                                <small class="d-none d-md-flex m-0 ms-2 p-0 font-nun">Delete</small>
                            </button>
                        </div>
                    </li>
                    <li class="list-group-item d-flex flex-row justify-content-between align-items-center">
                        <p class="m-0 p-0">Bachelor of Science in Information Technology</p>
                        <div class="body-buttons d-flex flex-row justify-content-end align-items-center">
                            <button class="btn btn-custom d-flex flex-row align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                                <img src="/images/edit.png" alt="">
                                <small class="m-0 ms-2 p-0 font-nun d-none d-md-flex">Edit</small>
                            </button>
                            <button class="btn btn-custom d-flex flex-row align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#deleteCourseModal">
                                <img src="/images/delete.png" alt="">
                                <small class="d-none d-md-flex m-0 ms-2 p-0 font-nun">Delete</small>
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div> 
    <!-- TODO scripts -->
    <script>
        var links = document.querySelectorAll('.navigation a');

        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var target = this.getAttribute('href');
                var offset = document.querySelector(target).offsetTop - 100;

                window.scrollTo({
                top: offset,
                behavior: 'smooth'
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-form-btn').click(function() {
                var form_id = $(this).data('formid');
                $('#form_id').val(form_id);
            });
        });
    </script>
@endsection