@extends('layout.main')

@section('content')
    <!-- HOMEPAGE SECTION -->
    <div class="homepage-cover">
        <div class="row w-100">
            <nav class="navbar navbar-expand-md navbar-dark" id="usernav">
                <div class="container-fluid">
                    <div class="logo navbar-brand">
                        <span class="font-mont font-bold">MSU-MSAT Registrar's Online Appointment</span>
                        <span class="font-small font-mont font-white location" href="#">Maigo, Lanao del Norte</span>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav font-mont ms-auto">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link active">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#about-sect" class="nav-link">About</a>
                                </li> 
                                <li class="nav-item">
                                    <a href="{{ route('announcement.dashboard') }}" class="nav-link">Announcements</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('faqs') }}" class="nav-link">FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row content-cover d-flex flex-row align-items-center">
            <div class="col-md-6 con1-pad">
                @if(count($announcements)>0)
                <div class="container announcement" id="announcement-sect">
                    <p class="head font-mont title font-bold">ANNOUNCEMENTS</p>
                    @foreach ( $announcements as $announcement )
                    <div class="row notice">
                        <p class="title font-mont font-semibold" id="postTitle">{{ $announcement->announcement_title }} </p>
                        <p class="font-mont font-small date" id="datePosted">Posted: {{ $announcement->created_at->format('F d, Y') }} </p>
                        <p class="font-small subtitle" id="postSubtitle">{{ substr($announcement->announcement_text, 0, 250) . '...' }}</p>
                        <a id="btn-readMore" href="{{ route('announcement.dashboard') }}" class="ms-auto font-small font-black btn">Read More</a>
                    </div>
                    @endforeach
                    <style>
                        .announcement:nth-child(n+3) {
                            display: none;
                        }
                    </style>
                </div>
                @endif
            </div>
            
            <!-- WELCOME -->
            <div class="col-md-6 make-appoint">
                <p class="display-text font-mont font-bold font-white">Make Your Online <br>Appointment <br>Now</p>
                <a href="#login-register" class="btn" id="btn-make-appoint">Click Here</a>
            </div>
        </div>
    </div>

    <div class="row w-100 faq-login-sect" id="login-register">
        <div class="row w-100 faq-login-card p-0 d-flex align-items-center">
            <div class="col-md-6 faq-sect">
                <div class="faq-sect-body">
                    <div class="faq-sect-head d-flex flex-row align-items-center">
                        <div class="msat-logo"><img src="http://127.0.0.1:8000/images/msat-logo.png" alt="MSAT logo"></div>
                        <div class="msat-faq title font-mont font-bold font-white mx-3">Frequently Asked Questions (FAQs)</div>
                    </div>
                    <div class="article-list d-flex flex-column mt-3">
                        <div class="article">
                            <p>How to make an Appointment?</p><button class="btn"><a href="{{ route('faqs') }}" class="nav-link">>></a></button>
                        </div>
                        <div class="article">
                            <p>What are the requirements?</p><button class="btn"><a href="{{ route('faqs') }}" class="nav-link">>></a></button>
                        </div>
                        <div class="article">
                            <p>Document Fees.</p><button class="btn"><a href="{{ route('faqs') }}" class="nav-link">>></a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 login-register-sect">
                <div class="login-sect" id="login-sect">
                    <div class="login-sect-head">
                        <p class="display-6 font-mont font-bold">Sign In</p>
                    </div>
                    <form action="{{ route('login-user') }}" method="POST">
                    @csrf
                      @if (Session::has('success'))
                      <div class="alert alert-success">{{ Session::get('success') }}</div>
                      @endif
                        @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif 
                        <div class="row mb-3">
                            <input class="form-control form-control-lg" name="email" type="email" placeholder="Email" aria-label="default input example" value="{{ old('email') }}" >
                            <span class="text-danger">@error('email'){{ $message }} @enderror </span> 
                        </div>
                        <div class="row mb-2">
                            <input class="form-control form-control-lg"  name="password" type="password" placeholder="Password" aria-label="default input example">
                            <span class="text-danger">@error('password'){{ $message }} @enderror </span> 
                        </div>
                        <div class="row">
                            <a href="#" class="forgot-pass-link mb-3 font-este d-flex flex-row justify-content-end">Forgot Password?</a>
                        </div>  
                        <div class="row d-flex flex-row justify-content-end mb-3">
                            <button type="submit" class="btn btn-login-register font-mont font-body">Sign In</button>
                        </div>   
                    </form>
                    <div class="login-sect-footer d-flex flex-row justify-content-center font-mont font-body">
                        Don't have an account yet? <button href="#" id="registerBtn" onclick="register()">Register.</button>
                    </div>
                </div>

                <!-- REGISTRATION -->
                <div class="register-sect" id="register-sect">
                    <div class="login-sect-head">
                        <p class="display-6 font-mont font-bold">Register</p>
                    </div>
                    <form action="{{ route('registration-user') }}" method="POST">
                                @csrf
                                @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="inputFirstName">First Name</label>
                                <input type="text" name="firstName" class="form-control" value="{{ old('firstName') }}" id="inputFirstName" placeholder="First Name">
                                <span class="text-danger">@error('firstName'){{ $message }} @enderror </span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputLastName">Last Name</label>
                                <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" id="inputLastName" placeholder="Last Name">
                                <span class="text-danger">@error('lastName'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-lg-6">
                                <label for="inputMiddleName">Middle Name</label>
                                <input type="text" class="form-control" value="{{ old('middleName') }}" name="middleName" id="inputMiddleName" placeholder="Optional">
                                
                            </div>
                            <div class="col-lg-6">
                                <label for="inputSuffix">Suffix</label>
                                <input type="text" class="form-control" value="{{ old('suffix') }}" name="suffix" id="inputSuffix" placeholder="Optional">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-lg-7">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="inputAddress" placeholder="Address">
                                <span class="text-danger">@error('address'){{ $message }} @enderror </span>
                            </div>
                            <div class="col-lg-5">
                                <label for="inputSchoolID">Student ID</label>
                                <input type="text" class="form-control" name="school_id" value="{{ old('school_id') }}" id="inputSchoolID" placeholder="School ID">
                                <span class="text-danger">@error('school_id'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-lg-6">
                                <label for="inputCpNo">Cellphone No.</label>
                                <input type="text" class="form-control" name="cell_no" id="inputCpNo" placeholder="Cellphone No.">
                                <span class="text-danger">@error('cell_no'){{ $message }} @enderror </span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="inputEmail" placeholder="Email">
                                <span class="text-danger">@error('email'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-lg-6">
                                <label for="inputCivilStatus">Civil Status</label>
                                <select class="form-control" name="civil_status" id="inputCivilStatus">
                                  <option value="">Choose...</option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                  <option value="Single Parent">Single Parent</option>
                                  <option value="Widow">Widow</option>
                                  <option value="Divorce">Divorced</option>
                                  <option value="Annulled">Annulled</option>
                                  <option value="Separated">Separated</option>
                                </select>
                                <span class="text-danger">@error('civil_status'){{ $message }} @enderror </span>
                            </div>
                            <div class="col-lg-6">
                                <label for="inputBirthdate">Birthdate</label>
                                <input type="date" class="form-control" name="birthdate"  id="inputBirthdate">
                                <span class="text-danger">@error('birthdate'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-lg-3">
                                <label for="inputGender">Gender</label>
                                <select class="form-control" name="gender" id="inputGender">
                                  <option value="">Choose...</option>
                                  <option value="Female">Female</option>
                                  <option value="Male">Male</option>
                                </select>
                                <span class="text-danger">@error('gender'){{ $message }} @enderror </span>
                            </div>
                            @if(isset($courses) && count($courses) > 0)
                            <div class="col-lg-9">
                                {{-- <label for="inputCourse">Course</label>
                                <select class="form-control" name="course" value="{{ old('course') }}" id="inputCourse">
                                    <option value="">Choose...</option>
                                    <option value="Secondary High School / Senior High School">Secondary ( High School / Senior High School )</option>
                                    <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                                    <option value="Bachelor of Technology and Livelihood Education">Bachelor of Technology and Livelihood Education</option>
                                    <option value="Bachelor of Technical-Vocational Teacher Education">Bachelor of Technical-Vocational Teacher Education</option>
                                    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                                    <option value="Bachelor of Industrial Technology Major in Drafting">Bachelor of Industrial Technology Major in Drafting</option>
                                    <option value="Bachelor of Industrial Technology Major in Garments Fashion and Design">Bachelor of Industrial Technology Major in Garments Fashion and Design</option>
                                    <option value="Bachelor of Industrial Technology Major in Mechanical Technology">Bachelor of Industrial Technology Major in Mechanical Technology</option>
                                    <option value="Bachelor of Industrial  Technology Major in Food and Service Management">Bachelor of Industrial  Technology Major in Food and Service Management</option>
                                    <option value="Bachelor of Industrial Technology Major in Electrical Technology">Bachelor of Industrial Technology Major in Electrical Technology</option>
                                    <option value="Bachelor of Industrial Technology Major in Automotive Technology">Bachelor of Industrial Technology Major in Automotive Technology</option>
                                  </select>
                                  <span class="text-danger">@error('course'){{ $message }} @enderror </span> --}}
                                  <label for="inputCourse">Course</label>
                                    <select class="form-control" id="inputCourse" name="course">
                                        <option value="">Choose..</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
                                        @endforeach
                                        <option value="other">Other (please specify)...</option>
                                    </select>
                                    <div id="otherCourseInput" style="display:none;">
                                        <label for="inputOtherCourse">Other Course</label>
                                        <input type="text" class="form-control" id="inputOtherCourse" name="course_name">
                                    </div>
                            </div>
                            @else
                                <p>No courses found.</p>
                            @endif
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-lg-3">
                                <label for="inputGender">Status</label>
                                <select class="form-control" name="status" id="inputStudentStatus" required>
                                    <option value="">Choose...</option>
                                    <option value="Junior High School Student (Grades 7-10)">Junior High School Student (Grades 7-10)</option>
                                    <option value="Senior High School Student (Grades 11-12)">Senior High School Student (Grades 11-12)</option>
                                    <option value="Senior High School Graduate (High School Diploma)">Senior High School Graduate (High School Diploma)</option>
                                    <option value="Undergraduate College Student (Bachelor's Degree Program)">Undergraduate College Student (Bachelor's Degree Program)</option>
                                    <option value="Undergraduate College Alumni (Bachelor's Degree Completed)">Undergraduate College Alumni (Bachelor's Degree Completed)</option>
                                    <option value="Master's Degree Student (Master's Degree Program)">Master's Degree Student (Master's Degree Program)</option>
                                    <option value="Master's Degree Alumni (Master's Degree Completed)">Master's Degree Alumni (Master's Degree Completed)</option>                                    
                                    </select>
                                <span class="text-danger">@error('status'){{ $message }} @enderror </span>
                            </div>
                            <div class="col-lg-9">
                                <div id="reg-input-acadYear" style="display:block;">
                                    <label for="inputAcadYear">Academic Year</label>
                                    <input type="text" name="acad_year" class="form-control" id="inputAcadYear" placeholder="ex. 2022-2023">
                                </div>
                                <div id="reg-input-gradYear" style="display:none;">
                                    <label for="inputGradYear">Year Graduated</label>
                                    <input type="text" name="grad_year" class="form-control" id="inputGradYear" placeholder="ex. 2022-2023">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-lg-12">
                                <label for="inputPassword">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                                <span class="text-danger">@error('password'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-row justify-content-center mt-3">
                            <div class="check-custom">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="acceptTerms" id="acceptTerms">
                                    <label for="acceptTerms" class="form-check-label" >I have read and accept <button>Terms and Services</button></label>
                                </div> 
                            </div>
                        </div>
                        <div class="row d-flex flex-row justify-content-end my-3">
                            <button type="submit" class="btn btn-login-register font-mont font-body">Register</button>
                        </div>
                    </form>
                    <div class="register-sect-footer d-flex flex-row justify-content-center font-mont font-body">
                        Do you already have an account?  <button href="#" id="signinBtn" onclick="signin()">Sign in.</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ABOUT SECTION --> 
    <div class="about row">
        <div class="col-md-6 about-details">
            <div class="about-title display-text font-mont font-bold">MSU-MSAT Registrar</div>    
            <div class="about-subtitle font-este font-body">
                <p>The Registrar's office is a crucial department in Mindanao State University - Maigo School of Arts and Trades, that plays a vital role in maintaining academic integrity. The office manages student records, ensuring that information is up-to-date and complete, and coordinates the issuance of transcripts and diplomas. Additionally, the Registrar's office is responsible for enforcing academic policies and procedures, such as grading and credit transfer, and provides guidance and support to students regarding registration and academic requirements. <br><br>
                    The Registrar's office in Mindanao State University - Maigo School of Arts and Trades is often the main point of contact for students seeking academic assistance. They provide academic counseling and support services to students who are struggling with their coursework and ensure that students receive the support they need to succeed academically. Overall, the Registrar's office is an essential part of Mindanao State University - Maigo School of Arts and Trades as it ensures the accuracy of student records, enforces academic policies, and supports student success.</p>
            </div>
        </div>
        <div class="col-md-6 about-image">
        </div>
    </div>

    <div class="space"></div>
    <div class="footer"></div>

    <!-- CONTACT US SECTION floating button-->
    <div class="fixed-bottom" id="contactus">
        <div class="contactus-form">
            <div class="head">
                Contact Us
            </div>
        </div>
        <button class="btn font-mont" id="btn-support" data-bs-toggle="modal" data-bs-target="#contact-us-modal">
            <i class="fa-regular fa-message icon-support"></i>
            <p>Contact Us</p>
        </button>
    </div>

    @include('layout.modal.data-privacy')
    @include('layout.modal.contact-us')

    <script>
        var courseSelect = document.getElementById("inputCourse");
        var otherCourseInput = document.getElementById("otherCourseInput");
    
        courseSelect.addEventListener("change", function() {
            if (courseSelect.value == "other") {
                otherCourseInput.style.display = "block";
            } else {
                otherCourseInput.style.display = "none";
            }
        });
    </script>
@endsection