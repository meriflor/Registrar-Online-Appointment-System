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
    <div class="row d-flex flex-row m-2">
        <div class="appointment-records p-4">
            <div class="w-100 fs-2 font-bold font-nun mb-2">Appointment Requests</div>
            <div class="table-rounded">
                <table id="appointmentRecords" class="table table-bordered table-sm font-nun table-striped">
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
                        @if(count($bookings)>0)
                            @foreach ($bookings as $booking)
                            <tr class="text-center">
                                <td>{{ $booking->appointment->booking_number }}</td>
                                <td>{{ $booking->user->school_id }}</td>
                                <td>{{ $booking->user->firstName }}</td>
                                <td>{{ $booking->user->lastName }}</td>
                                <td>{{ $booking->appointment->form->name}}</td>
                                <td>{{ $booking->created_at->format('M d, Y h:i A') }}</td>
                                <td class="status">{{ $booking->appointment->status }}</td>
                                <td>
                                    <!-- review -->
                                    <a  type="button" 
                                        class="btn view-request p-0 accept-btn" 
                                        id="accept-btn"
                                        style="display: block;"
                                        data-accept-id="{{ $booking->appointment->id }}">
                                        Accept
                                    </a>
                                    <a  type="button" 
                                        class="btn view-request p-0 done-btn" 
                                        id="done-btn"
                                        style="display: none;"
                                        data-done-id="{{ $booking->appointment->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#status_appointment_modal">
                                        Done
                                    </a>
                                    <a  type="button" 
                                        class="btn view-request p-0 claimed-btn" 
                                        id="claimed-btn"
                                        style="display: none;"
                                        data-claimed-id="{{ $booking->appointment->id }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#status_appointment_modal">
                                        Is already claimed?
                                    </a>
                                </td>
                                <td class="td-view">
                                    <a
                                        type="button"
                                        class="btn view-request p-0 view-btn"
                                        id="{{ $booking->id }}"
                                        >View</a
                                    >
                                </td>
                            </tr>
                            @endforeach
                            
                            @endif
                    </tbody>
                </table>
                {{-- <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                    <ul class="pagination font-nun">
                        <li class="page-item{{ ($bookings->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $bookings->previousPageUrl() }}" tabindex="-1" aria-disabled="{{ ($bookings->currentPage() == 1) ? 'true' : 'false' }}">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $bookings->lastPage(); $i++)
                        <li class="page-item{{ ($bookings->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $bookings->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor
                        <li class="page-item{{ ($bookings->currentPage() == $bookings->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $bookings->nextPageUrl() }}" aria-disabled="{{ ($bookings->currentPage() == $bookings->lastPage()) ? 'true' : 'false' }}">Next</a>
                        </li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>

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
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr){
                        console.log(xhr.responseText);
                    }
                });
                $('#status_appointment_modal').modal('hide');
            });
        });
    </script>
@endsection
