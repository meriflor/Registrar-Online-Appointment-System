<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Online Appointment</title>
    
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    
    <link rel="icon" type="image/png" href="images/msat-logo.png">
    <link rel="stylesheet" href="css/dashboard/dasboard02.css">
    <link rel="stylesheet" href="css/dashboard/fonts.css">
    <link rel="stylesheet" href="css/dashboard/breakpoints.css">
    <link rel="stylesheet" href="css/dashboard/modal.css">
    <link rel="stylesheet" href="css/dashboard/reciept.css">
    <link rel="stylesheet" href="css/defaultcss/scrollbar.css">

    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

</head>
<body> 

    <!-- NAVBAR pan ni //TODO -->
    <div class="navbar-cover">
        <nav class="navbar navbar-expand-md navbar-dark p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <div class="d-flex flex-row justify-content-between align-items-center w-100 container py-4">
                    <div class="navbar-brand d-flex flex-row align-items-center">
                        <img src="/images/msat-logo.png" alt="">
                        <span class="font-mont font-bold mx-3 lh-10">MSU-MSAT Registrar's Online <br>Appointment</span>
                    </div>
                    <div class="button">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="menu w-100 py-2">
                    <div class="container d-flex flex-row justify-content-start">
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                              <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav font-mont">
                                    <li class="nav-item">
                                        <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/faqs" class="nav-link">FAQs</a>
                                    </li> 
                                    <li class="nav-item">
                                        <a href="/appointment-records" class="nav-link {{ Request::is('appointment-records') ? 'active' : '' }}">Appointments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/notification" class="nav-link {{ Request::is('notification') ? 'active' : '' }}">Notification</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle {{ Request::is('edit-profile', 'settings') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $firstName }}   {{ $lastName }}
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/edit-profile">Edit Profile</a></li>
                                            <li><a class="dropdown-item" href="/settings">Account Settings</a></li>
                                            <li><a class="dropdown-item" href="logout">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- content sa user page,, mgchange2 gamit atung extend2 section2 chu2, idivide nlng daun palihog-->
    <div class="site-content d-flex justify-content-center p-5">
        <!-- dashboard -->
        <div class="dashboard d-flex row flex-row w-100 font-mont" id="dashboard">
            <!-- fix -->
            <div class="col-md-4 mb-4 font-mont">
                <div class="content-box p-4">
                    <h5 class="font-bold font-maroon">Announcements</h5>
                    <ul class="list-group list-group-flush">
                        @if(count($announcements) > 0)
                            @foreach($announcements as $announcement)
                            <a href="/announcement" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $announcement->announcement_title }}</h6>
                                    <small class="text-body-secondary">{{ $announcement->created_at->format('m/d/y') }}</small>
                                </div>
                            </a>
                        @endforeach
                        @else
                            <li class="list-group-item">There are no announcements at the moment.</li>
                        @endif
                    </ul>
                    <h5 class="mt-5 font-bold font-maroon">Appointments</h5>
                    <ul class="list-group list-group-flush">
                        @if(count($pending) > 0)
                            @foreach($pending as $pendapp)
                            <li class="list-group-item"> <b>{{ $pendapp->form->name }}</b>  on <b>{{ $pendapp->appointment_date }}</b><b> (</b>
                                @if($pendapp->status == 'Pending')
                                    <span style="color: #4a7453;"><i><b>Pending</b></i></span>
                                @elseif($pendapp->status == 'On Process')
                                    <span style="color: #3c8fad;"><i><b>On Process</b></i></span>
                                @elseif($pendapp->status == 'Ready to Claim')
                                    <span style="color: #c18930;"><i><b>Ready to Claim</b></i></span>
                                @endif
                                <b>)</b> 
                            </li>
                            @endforeach
                        @else
                            <li class="list-group-item">You have no pending appointments at the moment.</li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-8 ps-3">
                <div class="dashboard-content">
                    @yield('content')
                    <!-- dashboard-document lists appointment -->
                    <!-- edit profile section link -->
                    <!-- account settings section  -->
                    <!-- APPOINTMENT RECORD SECTION -->
                </div>
            </div>
        </div>
    </div>

    <!-- modalizationizest -->
                <!-- appointmentModal -->

                <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif   -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src="js/dashboard/navbar.js"></script>
    <!-- <script src="js/dashboard/dashboard.js"></script> -->
    <script src="js/navbar.js"></script>
    <script src="js/form.js"></script>
    <!-- <script src="js/dashboard/forms.js"></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>

    <link rel="stylesheet" href="{{ asset('css/defaultcss/calendar.css') }}" />
    @include('appointment.modal.cancel-app')
    @include('appointment.modal.book-appointment')
    @include('appointment.modal.review')
    @include('appointment.modal.confirmation')

    <!-- script for the calendar and such exclusively for appointment blade php -->
    <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        var appointment_date;
        $(document).ready(function() { 
            var cell;

            $('#download-button').on('click', function() {
                window.jsPDF = window.jspdf.jsPDF;

                html2canvas(document.querySelector('#my-div')).then(function(canvas) {
                    var imgData = canvas.toDataURL('image/png');
                    var pdf = new jsPDF();
                    var imgWidth = 190;
                    var imgHeight = 100;
                    var marginLeft = 10; // adjust as necessary
                    var marginTop = 10; // adjust as necessary
                    var marginRight = 10; // adjust as necessary
                    var marginBottom = 10; // adjust as necessary
                    pdf.addImage(imgData, 'PNG', marginLeft, marginTop, imgWidth, imgHeight);
                    pdf.save('my-div.pdf');
                    console.log("is clicked");
                });
            });

            $('#print-button').on('click', function() {
                html2canvas(document.querySelector('#my-div')).then(function(canvas) {
                    var imgData = canvas.toDataURL('image/png');
                    var pdf = new jsPDF();
                    var imgWidth = 190;
                    var imgHeight = 100;
                    var marginLeft = 10; // adjust as necessary
                    var marginTop = 10; // adjust as necessary
                    var marginRight = 10; // adjust as necessary
                    var marginBottom = 10; // adjust as necessary
                    pdf.addImage(imgData, 'PNG', marginLeft, marginTop, imgWidth, imgHeight);
                    pdf.autoPrint(); // automatically open the print dialog box
                    window.open(pdf.output('bloburl'), '_blank');
                    console.log("clicked");
                });
            });
            $('#calendar').fullCalendar({
                editable:true,
                header:{
                    left:'prev,next today',
                    right:'title'
                },
                editable: false,
                businessHours: {
                    dow: [1,2,3,4,5], // Monday - Friday only
                    start: '08:00',
                    end: '17:00',
                },
                selectConstraint: {
                    dow: [1, 2, 3, 4, 5] // The days of the week when selections are allowed
                },
                events:'/appointment_slots',
                selectable:true,
                selectHelper: true,
                select: function(date, jsEvent, view, event, element){
                    var events = $('#calendar').fullCalendar('clientEvents');
                    var event = events.find(e => moment(e.start).isSame(date, 'day'));
                    var jsDate = date.toDate();
                    var new_date;
                    
                    if (event && (event.isDisabled || event.status === "Full")) {
                        // alert("Full or disabled");
                    } else if (!event){
                        //kasni is gicheck nya if naa bay event aning mga adlawa,, like naa bay naset na appointment ang admin,, if wala then return false
                        return false;
                    } else {
                        var new_cell;
                        if(!appointment_date){
                        //if wa pay sulod, magset syag appointment
                            cell = $(`.fc-bg td[data-date="${date.format('YYYY-MM-DD')}"]`);
                            appointment_date = moment(date).format('MMMM DD, YYYY');
                            console.log('Appointment date:', appointment_date);
                            alert(appointment_date + " is your appointment date");
                            cell.addClass('fc-selected-date');
                            $('#app_date').text(appointment_date);
                            event.title = "Selected";
                        }
                        /*else, icompare nya ang new date nga iyng giclick sa current naset 
                        na appointment date,, if same sya way laing himoon*/
                        new_date = moment(event.start).format('MMMM DD, YYYY');
                        new_cell = $(`.fc-bg td[data-date="${date.format('YYYY-MM-DD')}"]`);
                        if(new_date === appointment_date){
                            return false;
                        }
                        //else, ichange nya ang appointment date sa new date
                        alert("Do you want to change your appointment date to " + new_date + " ?")
                        
                        cell.removeClass('fc-selected-date');
                        appointment_date = new_date;
                        cell = new_cell;
                        cell.addClass('fc-selected-date');
                        $('#app_date').text(appointment_date);
                        console.log(appointment_date + " is now your new appointment date");
                    }
                },
                eventRender: function(event, element) {
                    if (event.slots === 0 || event.isDisabled === true) { //if disabled,, appointment slots == 0 as default
                        element.css('display', 'none');
                        var cell = $(`.fc-bg td[data-date="${event.start.format('YYYY-MM-DD')}"]`);
                        // cell.addClass('fc-disabled-01');
                    }if(event.status === "Available"){
                        element.addClass('fc-event-available');
                    }else{
                        element.addClass('fc-event-full');
                    }
                },
                dayRender: function(date, cell, event) {
                    var currentDate = new Date();//css,, disabled ang mga cell
                    if (date < currentDate) {
                        $(cell).addClass('fc-disabled');
                    }
                    if ($(cell).hasClass('fc-disabled')) {
                        return;
                    }if (date === appointment_date) {
                        $(cell).addClass('fc-selected-event');
                    }
                }
            })
        });
        
        var a_transfer;
        var b_transfer;
        var a_transfer_school;
        var b_transfer_school;
        $('.open-modal').on('click', function() {
            var form_id = $(this).data('form-id');
            var form_name = $(this).data('form-name');
            var form_fee = $(this).data('form-fee');
            var form_max_time = $(this).data('form-max-time');
            var accordion_item = $(this).closest('.accordion-item');
            var accordion_id = accordion_item.find('.accordion-collapse').attr('id');
            var modal = $('#appointmentModal');

            if(form_name === 'Issuance of Transcript of Records'){
                $('#app-acad-year').show();
            }else{
                $('#app-acad-year').hide();
            }
            
            modal.find('#exp_date').text(form_max_time);
            modal.find('#form-name').text(form_name);
            modal.find('#form_name').text(form_name);
            modal.find('#doc_fee').text(form_fee);
            modal.find('#form_id').val(form_id);
            modal.find('#accordion_id').val(accordion_id);
            console.log(form_id);
            console.log(form_name);
            console.log(accordion_id);
            $('#appointmentModal').modal('show');
        });


// review
        $('#proceedButton').on('click', function(event) {
            var form_id = $('#form_id').val();
            var app_purpose = $('#app_purpose').val();
            var acad_year = $('#acad_year').val();
            var num_copies = parseInt(document.querySelector('select[name="num_copies"]').value);
            var payment_method = $('input[name=payment_method]:checked').val();
            var proof_of_payment = $('#proof_of_payment')[0].files[0];

            a_transfer = $('input[name=isATransfer]:checked').val();
            b_transfer = $('input[name=isBTransfer]:checked').val();
            a_transfer_school = $('#inputATransferSchool').val();
            b_transfer_school = $('#inputBTransferSchool').val();

            if(app_purpose === "" || payment_method === undefined || payment_method === undefined || a_transfer === undefined || b_transfer === undefined){
                alert('Please fill up the provided inputs.');
                return false;
            }if(payment_method === "GCash" && proof_of_payment === undefined){
                alert('Please upload your proof of payment.')
                return false;
            }if(appointment_date === undefined){
                alert('Please choose your appointment date.');
                return false;
            }else{
                $('#appointmentModal').modal('hide');
                $('#reviewModal').modal('show');
                $('#form_id').val(form_id);
                $('#acad_year').val(acad_year);
                $('#app_purpose01').val(app_purpose);
                $('#appointment_date').val(appointment_date);
                $('#payment_method_01').text(payment_method);
                if(num_copies == 1){
                    $('#num_copies_01').text(num_copies + " copy");
                    $('#num_copies_02').val(num_copies);
                }else{
                    $('#num_copies_01').text(num_copies + " copies");
                    $('#num_copies_02').val(num_copies);
                }
                

                //todo
                if(a_transfer == "Yes"){
                    $('#inputATransferInfo').val(a_transfer + ", " + a_transfer_school);
                }else{
                    $('#inputATransferInfo').val(a_transfer);
                }if(b_transfer == "Yes"){
                    $('#inputBTransferInfo').val(b_transfer + ", " + b_transfer_school);
                }else{
                    $('#inputBTransferInfo').val(b_transfer);
                }

                if (typeof proof_of_payment !== 'undefined') {
                    $('#proof_of_payment_01').val(proof_of_payment);
                }

                console.log(form_id);
                console.log(payment_method);
                console.log(proof_of_payment);
                console.log(app_purpose);
                console.log(acad_year);
                console.log(appointment_date);
                console.log(num_copies);
            }
        });

        $('#submitButton').on('click', function(event) {
            var form_id = $('#form_id').val();
            var app_purpose = $('#app_purpose').val();
            var acad_year = $('#acad_year').val();
            var payment_method = $('#payment_method_01').text();
            var proof_of_payment = $('#proof_of_payment').prop('files')[0];
            var appointment_date = $('#appointment_date').val();
            var num_copies = $('#num_copies_02').val();
            console.log(num_copies);
            if(a_transfer === "yes"){
                a_transfer = 1;
                a_transfer_school = $('#inputATransferSchool').val();
            }else{
                a_transfer = 0;
                a_transfer_school = null;
            }if(b_transfer === "yes"){
                b_transfer = 1;
                b_transfer_school = $('#inputBTransferSchool').val();
            }else{
                b_transfer = 0;
                b_transfer_school = null;
            }

            console.log(form_id);
            console.log(app_purpose);
            console.log(payment_method);
            console.log(proof_of_payment);
            console.log(acad_year);
            console.log(appointment_date);
            console.log(a_transfer);
            console.log(b_transfer);
            console.log(num_copies);
            $('#reviewModal').modal('hide');
            $('#confirmedModal').modal('show');
            
            var formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('form_id', form_id);
            formData.append('app_purpose', app_purpose);
            formData.append('acad_year', acad_year);
            formData.append('appointment_date', appointment_date);
            formData.append('a_transfer', a_transfer);
            formData.append('a_transfer_school', a_transfer_school);
            formData.append('b_transfer', b_transfer);
            formData.append('b_transfer_school', b_transfer_school);
            formData.append('payment_method', payment_method);
            formData.append('proof_of_payment', proof_of_payment);
            formData.append('num_copies', num_copies);

            $.ajax({
                url: "{{ route('bookAppointment') }}",
                method: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
            
        });
        
    </script>
</body>
</html>
