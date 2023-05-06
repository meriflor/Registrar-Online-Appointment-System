@extends('admin-dashboard.admin')

@section('content')
<div class="d-flex flex-row align-items-center mb-3">
    <a class="btn btn-custom d-flex flex-row align-items-center" href="/dashboard-admin/dashboard">
        <img src="/images/back-arrow.png" class="me-3"
        style=" height: 10px;
                width: 10px;"/>
        Home
    </a>
</div>
<nav class="navigation this-box mb-3">
    <ul class="font-nun small-nav">
        <li><a href="#pending">Pending</a></li>
        <li><a href="#onprocess">On Process</a></li>
        <li><a href="#readytoclaim">Ready to Claim</a></li>
        <li><a href="#claimed">Claimed</a></li>
    </ul>
</nav>

<!-- review ===================pending================================================== -->
<div class="row d-flex flex-row m-2" id="pending">
    <div class="appointment-records p-4">
        <div class="w-100 fs-2 font-bold font-nun mb-2">Pending Requests</div>
        <!-- <div class="d-flex flex-row justify-content-end mb-2">
            <select name="sort" id="colors" class="btn text-start">
                <option value="">Sort by:</option>
                <option value="booking_id">Appointment ID</option>
                <option value="created_at">Date Filled</option>
                <option value="documents">Documents</option>
                <option value="first_name">First Name</option>
                <option value="last_name">Last Name</option>
            </select>
        </div> -->
        @if(count($pending)>0)
        <div class="table-rounded">
            <table id="pendingRequests" class="table table-bordered table-sm font-nun table-striped">
                <thead class="table-head text-center">
                    <tr>
                        <th>Appointment Number</th>
                        <th>School ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Document Requested</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                        @foreach ($pending as $booking)
                        <tr class="text-center">
                            <td>{{ $booking->appointment->booking_number }}</td>
                            <td>{{ $booking->user->school_id }}</td>
                            <td>{{ $booking->user->firstName }}</td>
                            <td>{{ $booking->user->lastName }}</td>
                            <td>{{ $booking->appointment->form->name}}</td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>
                            <td class="status">{{ $booking->appointment->status }}</td>
                            <td>
                                <a  type="button" class="btn view-request p-0 accept-btn" id="accept-btn" style="display: block;" data-accept-id="{{ $booking->appointment->id }}">
                                    Accept
                                </a>
                                <a  type="button" class="btn view-request p-0 done-btn"  id="done-btn" style="display: none;" data-done-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                    Done
                                </a>
                                <a  type="button"  class="btn view-request p-0 claimed-btn"  id="claimed-btn" style="display: none;" data-claimed-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                    Claimed
                                </a>
                            </td>
                            <td class="td-view">
                                <a type="button" class="btn view-request p-0 view-btn" id="{{ $booking->id }}">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                </tbody>
            </table>
        </div>
        @else
            <div class="text-center">We haven't received any appointment requests for this day yet.</div>
        @endif
    </div>
</div>
<!-- review ===============
<!-- review ======================================= on process=========================================== -->
@if(count($onprocess)>0)
<div class="row d-flex flex-row m-2 mt-5" id="onprocess">
    <div class="appointment-records p-4">
        <div class="w-100 fs-2 font-bold font-nun mb-2">On Process Documents</div>
        <div class="table-rounded">
            <table id="onProcessDocuments" class="table table-bordered table-sm font-nun table-striped">
                <thead class="table-head text-center">
                    <tr>
                        <th>Appointment Number</th>
                        <th>School ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Document Requested</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                        @foreach ($onprocess as $booking)
                        <tr class="text-center">
                            <td>{{ $booking->appointment->booking_number }}</td>
                            <td>{{ $booking->user->school_id }}</td>
                            <td>{{ $booking->user->firstName }}</td>
                            <td>{{ $booking->user->lastName }}</td>
                            <td>{{ $booking->appointment->form->name}}</td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>
                            <td class="status">{{ $booking->appointment->status }}</td>
                            <td>
                                <a  type="button" class="btn view-request p-0 accept-btn" id="accept-btn" style="display: block;" data-accept-id="{{ $booking->appointment->id }}">
                                    Accept
                                </a>
                                <a  type="button" class="btn view-request p-0 done-btn"  id="done-btn" style="display: none;" data-done-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                    Done
                                </a>
                                <a  type="button"  class="btn view-request p-0 claimed-btn"  id="claimed-btn" style="display: none;" data-claimed-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                    Claimed
                                </a>
                            </td>
                            <td class="td-view">
                                <a type="button" class="btn view-request p-0 view-btn" id="{{ $booking->id }}">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
<!-- ====================ready to claim ============================================================= -->
@if(count($ready)>0)
<div class="row d-flex flex-row m-2 mt-5" id="readytoclaim">
    <div class="appointment-records p-4">
        <div class="w-100 fs-2 font-bold font-nun mb-2">Ready to Claim Documents</div>
        <div class="table-rounded">
            <table id="readyToClaimDocuments" class="table table-bordered table-sm font-nun table-striped">
                <thead class="table-head text-center">
                    <tr>
                        <th>Appointment Number</th>
                        <th>School ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Document Requested</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                        @foreach ($ready as $booking)
                        <tr class="text-center">
                            <td>{{ $booking->appointment->booking_number }}</td>
                            <td>{{ $booking->user->school_id }}</td>
                            <td>{{ $booking->user->firstName }}</td>
                            <td>{{ $booking->user->lastName }}</td>
                            <td>{{ $booking->appointment->form->name}}</td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>
                            <td class="status">{{ $booking->appointment->status }}</td>
                            <td>
                                <a  type="button" class="btn view-request p-0 accept-btn" id="accept-btn" style="display: block;" data-accept-id="{{ $booking->appointment->id }}">
                                    Accept
                                </a>
                                <a  type="button" class="btn view-request p-0 done-btn"  id="done-btn" style="display: none;" data-done-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                    Done
                                </a>
                                <a  type="button"  class="btn view-request p-0 claimed-btn"  id="claimed-btn" style="display: none;" data-claimed-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                    Claimed
                                </a>
                            </td>
                            <td class="td-view">
                                <a type="button" class="btn view-request p-0 view-btn" id="{{ $booking->id }}">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
<!-- review ===================================== Claimed =================================================================== -->
@if(count($claimed)>0)
<div class="row d-flex flex-row m-2 mt-5" id="claimed">
    <div class="appointment-records p-4">
        <div class="w-100 fs-2 font-bold font-nun mb-2">Claimed Documents</div>
        <div class="table-rounded">
            <table id="claimedDocuments" class="table table-bordered table-sm font-nun table-striped">
                <thead class="table-head text-center">
                    <tr>
                        <th>Appointment Number</th>
                        <th>School ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Document Requested</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                        @foreach ($claimed as $booking)
                        <tr class="text-center">
                            <td>{{ $booking->appointment->booking_number }}</td>
                            <td>{{ $booking->user->school_id }}</td>
                            <td>{{ $booking->user->firstName }}</td>
                            <td>{{ $booking->user->lastName }}</td>
                            <td>{{ $booking->appointment->form->name}}</td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>
                            <td class="status">{{ $booking->appointment->status }}</td>
                            <td>
                                <a  type="button" class="btn view-request p-0 accept-btn" id="accept-btn" style="display: block;" data-accept-id="{{ $booking->appointment->id }}">
                                    Accept
                                </a>
                                <a  type="button" class="btn view-request p-0 done-btn"  id="done-btn" style="display: none;" data-done-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                    Done
                                </a>
                                <a  type="button"  class="btn view-request p-0 claimed-btn"  id="claimed-btn" style="display: none;" data-claimed-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                    Claimed
                                </a>
                            </td>
                            <td class="td-view">
                                <a type="button" class="btn view-request p-0 view-btn" id="{{ $booking->id }}">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif



<button id="back-to-top-btn" class="btn btn-custom show" style="color: #131313;">Back to top</button>

    <!-- review -->

    <script src="{{ asset('js/admin/appointment/status-button.js') }}"></script>
    <script src="{{ asset('js/admin/appointment/info-display.js') }}"></script>
    <script>
        var url = "{{ url('') }}";
        // review
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $('#acceptApp').on('click', function(event){
                var id = $('#app_id').val();
                var status = $('#accept_status').val();
                console.log(id);
                console.log(status);
                
                $.ajax({
                    url: "{{ url('acceptStatus') }}",
                    method: "PUT",
                    data: { 
                        id: id,
                        status: status
                    },
                    success: function(response){
                        // do something on success
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr){
                        // do something on error
                        console.log(xhr.responseText);
                    }
                });
                $('#status_appointment_modal').modal('hide');
            });
        });
        $(document).ready(function(){
            $('#doneApp').on('click', function(event){
                var id = $('#app_id').val();
                var status = $('#done_status').val();
                console.log(id);
                console.log(status);
                $.ajax({
                    url: "{{ url('doneStatus') }}",
                    method: "PUT",
                    data: { 
                        id: id,
                        status: status
                    },
                    success: function(response){
                        // do something on success
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr){
                        // do something on error
                        console.log(xhr.responseText);
                    }
                });
                $('#status_appointment_modal').modal('hide');
            });
        });
        $(document).ready(function(){
            $('#claimedApp').on('click', function(event){
                var id = $('#app_id').val();
                var status = $('#claimed_status').val();
                console.log(id);
                console.log(status);
                $.ajax({
                    url: "{{ url('claimedStatus') }}",
                    method: "PUT",
                    data: { 
                        id: id,
                        status: status
                    },
                    success: function(response){
                        // do something on success
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr){
                        // do something on error
                        console.log(xhr.responseText);
                    }
                });
                $('#status_appointment_modal').modal('hide');
            });
        });
    </script>
@endsection