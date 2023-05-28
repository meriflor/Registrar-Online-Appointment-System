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
    <link rel="stylesheet" href="{{ asset('css/defaultcss/calendar.css') }}" />
    <link rel="stylesheet" href="css/dashboard/notification.css" />
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <style>
    </style>

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
                                        <!-- fix -->
                                        <a href="/notification" class="nav-link {{ Request::is('notification') ? 'active' : '' }}">Notification
                                            <span id="notif-space">
                                                <span class="badge bg-danger" id="unread-notif"></span>
                                            </span>
                                        </a>
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
    <div class="site-content d-flex justify-content-center py-5 container">
        <!-- dashboard -->
        <div class="dashboard d-flex row flex-row w-100 font-mont" id="dashboard">
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
                            @php
                                $has_resched = false;
                                foreach($bookings as $booking) {
                                    if($booking->appointment_id == $pendapp->id && $booking->resched == 1) {
                                        $has_resched = true;
                                        break;
                                    }
                                }
                            @endphp
                            @if($has_resched)
                            <a class="list-group-item" href="/notification"> 
                                <b>{{ $pendapp->form->name }}</b> on <b>{{ $pendapp->appointment_date }}</b>
                                
                                @if($has_resched)
                                    <span style="color: #f3f3f3; background-color: maroon;"><i><b>Reschedule</b></i></span>
                                @else
                                    @if($pendapp->status == 'Pending')
                                        <span style="color: #4a7453;"><i><b>Pending</b></i></span>
                                    @elseif($pendapp->status == 'On Process')
                                        <span style="color: #3c8fad;"><i><b>On Process</b></i></span>
                                    @elseif($pendapp->status == 'Ready to Claim')
                                        <span style="color: #c18930;"><i><b>Ready to Claim</b></i></span>
                                    @endif
                                @endif
                                </a>
                            @else
                                <li class="list-group-item" href="/notification"> 
                                <b>{{ $pendapp->form->name }}</b> on <b>{{ $pendapp->appointment_date }}</b>
                                
                                @if($has_resched)
                                    <span style="color: #f3f3f3; background-color: maroon;"><i><b>Reschedule</b></i></span>
                                @else
                                    @if($pendapp->status == 'Pending')
                                        <span style="color: #4a7453;"><i><b>Pending</b></i></span>
                                    @elseif($pendapp->status == 'On Process')
                                        <span style="color: #3c8fad;"><i><b>On Process</b></i></span>
                                    @elseif($pendapp->status == 'Ready to Claim')
                                        <span style="color: #c18930;"><i><b>Ready to Claim</b></i></span>
                                    @endif
                                @endif
                                </li>
                            @endif
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
    <script src="js/dashboard/navbar.js"></script>
    <!-- <script src="js/navbar.js"></script> -->
    <script src="js/form.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
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
            $('.download-button').on('click', function() {
                var app_id = $(this).data('app-id');
                window.jsPDF = window.jspdf.jsPDF;

                html2canvas(document.querySelector('#my-div-' + app_id)).then(function(canvas) {
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

            $('.print-button').on('click', function() {
                var app_id = $(this).data('app-id');
                html2canvas(document.querySelector('#my-div-' + app_id)).then(function(canvas) {
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
                longPressDelay: 0,
                select: function(date, jsEvent, view, event, element){
                    var events = $('#calendar').fullCalendar('clientEvents');
                    var event = events.find(e => moment(e.start).isSame(date, 'day'));
                    var jsDate = date.toDate();
                    var new_date;
                    var currentDate = new Date();
                    
                    if (event && (event.isDisabled || event.status === "Full")) {
                        return false;
                    } else if (!event){
                        //kasni is gicheck nya if naa bay event aning mga adlawa,, like naa bay naset na appointment ang admin,, if wala then return false
                        return false;
                    } else if(event && date < currentDate){
                        return false;
                    }else {
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
            var form_pages = $(this).data('form-pages');
            var form_max_time = $(this).data('form-max-time');
            var form_acad_year = $(this).data('form-acad_year');
            var form_requirements = $(this).data('form-requirements');
            var accordion_item = $(this).closest('.accordion-item');
            var accordion_id = accordion_item.find('.accordion-collapse').attr('id');
            var modal = $('#appointmentModal');

            console.log("acad year:"+ form_acad_year);
            console.log("form_requirements:"+ form_requirements);
            if(form_acad_year == 1){
                $('#app-acad-year').show();
            }else{
                $('#app-acad-year').hide();
            }if(form_requirements == 1){
                $('#requirements_section').show();
            }else{
                $('#requirements_section').hide();
            }
            
            if(form_pages > 1){
                var total = form_fee * form_pages;
                modal.find('#doc_fee').text("PHP "+total+".00");
            }else{
                modal.find('#doc_fee').text("PHP "+form_fee+".00");
            }
            

            if(form_fee == 0){
                modal.find('#payment_section').hide();
            }else{
                modal.find('#payment_section').show();
                $('#num_copies').on('change', function() {
                    var copies = $(this).val();
                    if(copies > 1){
                        var total = form_fee * form_pages * copies;
                        modal.find('#doc_fee').text("PHP "+total+".00");
                    }else{
                        var total = form_fee * copies;
                        modal.find('#doc_fee').text("PHP "+total+".00");
                    }
                });
            }
            modal.find('#exp_date').text(form_max_time);
            modal.find('#form-name').text(form_name);
            modal.find('#form_name').text(form_name);
            modal.find('#form_acad_year').text(form_acad_year);
            modal.find('#form_requirements').text(form_requirements);
            modal.find('#form_fee_val').val(form_fee);
            modal.find('#form_id').val(form_id);
            modal.find('#accordion_id').val(accordion_id);
            console.log(form_id);
            console.log(form_name);
            console.log(accordion_id);
            $('#appointmentModal').modal('show');
        });

        $('.dismissButton').click(function() {
            // Clear all inputs with the 'inputToClear' class
            $('#app_purpose').val('');
            $('#acad_year').val('');
            $('input[name="isATransfer"]').prop('checked', false);
            $('input[name="isBTransfer"]').prop('checked', false);
            $('#inputATransferSchool').val('');
            $('#inputBTransferSchool').val('');
            $('input[name="payment_method"]').prop('checked', false);
            $('#reference_number').val('');
            $('input[type="file"]').val(null);
            appointment_date = null;
            $('#app_date').text('Select a date first.');
            $('.fc-selected-date').removeClass('fc-selected-date');
            $('#gcash-sect').hide();
        });
// review
        $('#proceedButton').on('click', function(event) {
            var form_id = $('#form_id').val();
            var app_purpose = $('#app_purpose').val();
            var acad_year = $('#acad_year').val();
            var num_copies = parseInt(document.querySelector('select[name="num_copies"]').value);
            var payment_method = $('input[name=payment_method]:checked').val();
            var proof_of_payment = $('#proof_of_payment')[0].files[0];
            var reference_number = $('#reference_number').val();
            var form_fee = $('#form_fee_val').val();
            var form_acad_year = $('#form_acad_year').val();
            var form_requirements = $('#form_requirements').val();

            a_transfer = $('input[name=isATransfer]:checked').val();
            b_transfer = $('input[name=isBTransfer]:checked').val();
            a_transfer_school = $('#inputATransferSchool').val();
            b_transfer_school = $('#inputBTransferSchool').val();

            // fix requriements
            var files = $('#inputRequirements')[0].files;
            //fix end of requriements

            if(app_purpose === "" || a_transfer === undefined || b_transfer === undefined){
                alert('Please fill up the provided inputs.');
                return false;
            }
            if(form_fee != 0){
                if(payment_method === undefined){
                    alert('Please fill up the provided inputs.');
                    return false;
                }if(payment_method === "GCash" && (reference_number === null || reference_number === "" || reference_number === undefined)){
                    alert('Please type your reference number from your proof of payment.');
                    return false;
                }if(payment_method === "GCash" && proof_of_payment === undefined){
                    alert('Please upload your proof of payment.');
                    return false;
                }
            }if(form_requirements == 1){
                alert('Please upload your requirements.');
                return false;
            }

            if(appointment_date === undefined || appointment_date === null){
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
                if(form_fee == 0){
                    $('#payment_method_val').hide();
                    $('#reference_number_val').hide();
                }else{
                    $('#payment_method_val').show();
                    $('#reference_number_val').show();
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
                }if(payment_method === "Walk-in"){
                    $('#reference_number_01').text("N/A");
                }else{
                    $('#reference_number_01').text(reference_number);
                }

                console.log(form_id);
                console.log(payment_method);
                console.log(proof_of_payment);
                console.log(app_purpose);
                console.log(acad_year);
                console.log(appointment_date);
                console.log(num_copies);
                console.log(files);
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
            var reference_number = $('#reference_number_01').text();
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
            }if(payment_method === "Walk-in"){
                proof_of_payment = null;
            }if(payment_method === null || payment_method === undefined){
                payment_method = null;
            }

            var files = $('#inputRequirements')[0].files;

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
            formData.append('reference_number', reference_number);
            for (var i = 0; i < files.length; i++) {
                formData.append('requirements[]', files[i]);
                console.log(files[i]);
            }

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

        $.ajax({
            url: "{{ route('unread-notif') }}",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response.count)
                if(response.count <=0){
                   $('#notif-space').hide();
                }else{
                   $('#notif-space').show();
                    $('#unread-notif').text(response.count);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
            
    </script>
    @include('appointment.modal.reschedule')
</body>
</html>
