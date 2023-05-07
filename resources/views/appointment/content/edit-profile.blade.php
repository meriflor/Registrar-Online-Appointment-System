@extends('appointment.appointment')

@section('content')
    <div class="edit-profile" id="edit-profile">
        <div class="edit-profile-head">
            <p class="display-6 font-mont font-bold"> Edit Profile</p>
        </div>
        <div class="edit-profile-form">
            <form action="{{ route('updateProfile') }}" method="post"> 
                @csrf
                @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif 
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="editFirstName">First Name</label>
                        <input id="editFirstName" name="editFirstName" class="form-control" type="text" value="{{ $firstName }}" aria-label="default input example" required>
                    </div>    
                    <div class="col-md-6">
                        <label for="editLastName">Last Name</label>
                        <input id="editLastName" name="editLastName" class="form-control" type="text" value="{{ $lastName }}" aria-label="default input example" required>
                    </div>  
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="editMiddleName">Middle Name</label>
                        <input id="editMiddleName" name="editMiddleName" class="form-control" type="text" value="{{ $middleName }}" aria-label="default input example">
                    </div>  
                    <div class="col-md-6">
                        <label for="editSuffix">Suffix</label>
                        <input id="editSuffix" name="editSuffix" class="form-control" type="text" value="{{ $suffix }}" aria-label="default input example">
                    </div>  
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="editSchoolID">School ID</label>
                        <input id="editSchoolID" name="editSchoolID" class="form-control" type="text" value="{{ $school_id }}" aria-label="default input example" required>
                    </div> 
                    <div class="col-md-6">
                        <label for="editCpNo">Cellphone No.</label>
                        <input id="editCpNo" name="editCpNo" class="form-control" type="text" value="{{  $cell_no }}" aria-label="default input example" required>
                    </div>    
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="editEmail">Email</label>
                        <input id="editEmail" name="editEmail" class="form-control" type="email" value="{{ $email }}" aria-label="default input example" required>
                    </div>  
                    <div class="col-md-6">
                        <label for="editAddress">Address</label>
                        <input id="editAddress" name="editAddress" class="form-control" type="text" value="{{ $address }}" aria-label="default input example" required>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-lg-6">
                        <label for="editCivilStatus">Civil Status</label>
                        <select name="editCivilStatus" class="form-control" id="editCivilStatus" name="editCivilStatus" required>
                            <option value=""{{ $civil_status == null ? 'selected' : '' }}>Choose...</option>
                            <option value="Single"{{ $civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married"{{ $civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                            <option value="Single Parent"{{ $civil_status == 'Single Parent' ? 'selected' : '' }}>Single Parent</option>
                            <option value="Widow"{{ $civil_status == 'Widow' ? 'selected' : '' }}>Widow</option>
                            <option value="Divorced"{{ $civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                            <option value="Annulled"{{ $civil_status == 'Annulled' ? 'selected' : '' }}>Annulled</option>
                            <option value="Separated"{{ $civil_status == 'Separated' ? 'selected' : '' }}>Separated</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="editBirthdate">Birthdate</label>
                        <input type="date" class="form-control" id="editBirthdate" name="editBirthdate" value="{{ $birthdate }}" required>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-lg-6">
                        <label for="editGender">Gender</label>
                        <select name="editGender" class="form-control" id="editGender" required>
                            <option value=""{{ $gender == null ? 'selected' : '' }}>Choose...</option>
                            <option value="Female"{{ $gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Male"{{ $gender == 'Male' ? 'selected' : '' }}>Male</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="editCourse">Course</label>
                        <select name="editCourse" class="form-control" id="editCourse" required>
                            <option value=""{{ $course == null ? 'selected' : '' }}>Choose...</option>
                                <option value="Secondary High School / Senior High School"{{ $course == 'Secondary High School / Senior High School' ? 'selected' : '' }}>Secondary ( High School / Senior High School )</option>
                                <option value="Bachelor of Science in Computer Science"{{ $course == 'Bachelor of Science in Computer Science' ? 'selected' : '' }}>Bachelor of Science in Computer Science</option>
                                <option value="Bachelor of Technology and Livelihood Education"{{ $course == 'Bachelor of Technology and Livelihood Education' ? 'selected' : '' }}>Bachelor of Technology and Livelihood Education</option>
                                <option value="Bachelor of Technical-Vocational Teacher Education"{{ $course == 'Bachelor of Technical-Vocational Teacher Education' ? 'selected' : '' }}>Bachelor of Technical-Vocational Teacher Education</option>
                                <option value="Bachelor of Science in Hospitality Management"{{ $course == 'Bachelor of Science in Hospitality Management' ? 'selected' : '' }}>Bachelor of Science in Hospitality Management</option>
                                <option value="Bachelor of Industrial Technology Major in Drafting"{{ $course == 'Bachelor of Industrial Technology Major in Drafting' ? 'selected' : '' }}>Bachelor of Industrial Technology Major in Drafting</option>
                                <option value="Bachelor of Industrial Technology Major in Garments Fashion and Design"{{ $course == 'Bachelor of Industrial Technology Major in Garments Fashion and Design' ? 'selected' : '' }}>Bachelor of Industrial Technology Major in Garments Fashion and Design</option>
                                <option value="Bachelor of Industrial Technology Major in Mechanical Technology"{{ $course == 'Bachelor of Industrial Technology Major in Mechanical Technology' ? 'selected' : '' }}>Bachelor of Industrial Technology Major in Mechanical Technology</option>
                                <option value="Bachelor of Industrial  Technology Major in Food and Service Management"{{ $course == 'Bachelor of Industrial  Technology Major in Food and Service Management' ? 'selected' : '' }}>Bachelor of Industrial  Technology Major in Food and Service Management</option>
                                <option value="Bachelor of Industrial Technology Major in Electrical Technology"{{ $course == 'Bachelor of Industrial Technology Major in Electrical Technology' ? 'selected' : '' }}>Bachelor of Industrial Technology Major in Electrical Technology</option>
                                <option value="Bachelor of Industrial Technology Major in Automotive Technology"{{ $course == 'Bachelor of Industrial Technology Major in Automotive Technology' ? 'selected' : '' }}>Bachelor of Industrial Technology Major in Automotive Technology</option>
                            </select>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-lg-6">
                        <label for="editStatus">Status</label>
                        <select name="editStatus" class="form-control" id="editStatus" required>
                            <option value=""{{ $status == null ? 'selected' : '' }}>Choose...</option>
                            <option value="junior_high_student"  {{ $status == 'junior_high_student' ? 'selected' : '' }}>Junior High School Student (Grades 7-10)</option>
                            <option value="senior_high_student" {{ $status == 'senior_high_student' ? 'selected' : '' }}>Senior High School Student (Grades 11-12)</option>
                            <option value="senior_high_graduate" {{ $status == 'senior_high_graduate' ? 'selected' : '' }}>Senior High School Graduate (High School Diploma)</option>
                            <option value="undergraduate_student" {{ $status == 'undergraduate_student' ? 'selected' : '' }}>Undergraduate College Student (Bachelor's Degree Program)</option>
                            <option value="undergraduate_alumni" {{ $status == 'undergraduate_alumni' ? 'selected' : '' }}>Undergraduate College Alumni (Bachelor's Degree Completed)</option>
                            <option value="masteral_student" {{ $status == 'masteral_student' ? 'selected' : '' }}>Master's Degree Student (Master's Degree Program)</option>
                            <option value="masteral_alumni"  {{ $status == 'masteral_alumni' ? 'selected' : '' }}>Master's Degree Alumni (Master's Degree Completed)</option>   

                        </select>
                    </div>
                    <div class="col-lg-6">
                        <div id="edit-AcadYear" style="display:none;">
                            <label for="editAcadYear">Academic Year</label>
                            <input type="text" class="form-control" id="editAcadYear" name="editAcadYear" value="{{ $acadYear }}">
                        </div>
                        <div id="edit-GradYear" style="display:none;">
                            <label for="editGradYear">Year Graduated</label>
                            <input type="text" class="form-control" id="editGradYear" name="editGradYear" value="{{ $gradYear }}">
                        </div>
                    </div>
                </div>
                <div class="row d-flex flex-row justify-content-end my-3">
                    <button type="submit" class="btn btn-appoint font-mont font-body">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection