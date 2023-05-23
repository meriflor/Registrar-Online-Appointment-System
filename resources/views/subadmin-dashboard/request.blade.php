@extends('subadmin-dashboard.admin')

@section('content')
<div class="d-flex flex-row align-items-center mb-3">
    <a class="btn btn-custom d-flex flex-row align-items-center" href="/dashboard-admin-appointments/dashboard">
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
    @include('admin-dashboard.tables.request-pending-online-payment')
</div>
<!-- review ======================================= on process=========================================== -->
@if(count($onprocess)>0)
<div class="row d-flex flex-row m-2 mt-5" id="onprocess">
    <div class="appointment-records p-4">
        <div class="w-100 fs-2 font-bold font-nun mb-2">On Process Documents</div>
        <div class="table-rounded">
            <table id="onProcessDocuments" class="table font-nun hover display compact row-border">
                <thead class="table-head text-center">
                    <tr>
                        <th>Appointment Number</th>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Document Requested</th>
                        <th>Date Requested</th>
                        <th>Action</th>
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
                            <td>
                                <div class="dropdown d-flex flex-column justify-contents-center">
                                    <button class="btn sub-admin-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #1e1e1e !important;">
                                        <li>
                                            @if($booking->appointment->status == "On Process")
                                            <a  type="button" class="dropdown-item view-request done-btn"  id="done-btn" data-done-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                                Done
                                            </a>
                                            @endif
                                        </li>
                                        <li><hr class="dropdown-divider" style="border-top: 1px solid rgba(255,255,255,0.4);"></li>
                                        <li>
                                            <a type="button" class="dropdown-item view-request view-btn" id="{{ $booking->id }}">
                                                View
                                            </a>
                                        </li>
                                        <li>
                                            <a type="button" class="dropdown-item view-request remarks-btn" id="{{ $booking->id }}" data-remarks-id="{{ $booking->id }}" data-remarks-first="{{ $booking->user->firstName }}" data-remarks-last="{{ $booking->user->lastName }}" data-remarks-form="{{ $booking->appointment->form->name }}">
                                                Remarks
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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
            <table id="readyToClaimDocuments" class="table font-nun hover display compact row-border">
                <thead class="table-head text-center">
                    <tr>
                        <th>Appointment Number</th>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Document Requested</th>
                        <th>Date Requested</th>
                        <th>Action</th>
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
                            <td>
                                <div class="dropdown d-flex flex-column justify-contents-center">
                                    <button class="btn sub-admin-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #1e1e1e !important;">
                                        <li>
                                            @if($booking->appointment->status == "Ready to Claim")
                                            <a  type="button"  class="dropdown-item view-request claimed-btn"  id="claimed-btn" data-claimed-id="{{ $booking->appointment->id }}" data-bs-toggle="modal" data-bs-target="#status_appointment_modal">
                                                Claimed
                                            </a>
                                            @endif
                                        </li>
                                        <li><hr class="dropdown-divider" style="border-top: 1px solid rgba(255,255,255,0.4);"></li>
                                        <li>
                                            <a type="button" class="dropdown-item view-request view-btn" id="{{ $booking->id }}">
                                                View
                                            </a>
                                        </li>
                                        <li>
                                            <a type="button" class="dropdown-item view-request remarks-btn" id="{{ $booking->id }}" data-remarks-id="{{ $booking->id }}" data-remarks-first="{{ $booking->user->firstName }}" data-remarks-last="{{ $booking->user->lastName }}" data-remarks-form="{{ $booking->appointment->form->name }}">
                                                Remarks
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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
            <table id="claimedDocuments" class="table font-nun hover display compact row-border">
                <thead class="table-head text-center">
                    <tr>
                        <th>Appointment Number</th>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Document Requested</th>
                        <th>Date Requested</th>
                        <th>Status</th>
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
<script src="{{ asset('js/admin/appointment/remarks.js') }}"></script>
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