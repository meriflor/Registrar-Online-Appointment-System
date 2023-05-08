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
            <div class="w-100 fs-2 font-bold font-nun mb-2">Appointment Remarks</div>
            <div class="table-rounded">
                <table id="appointmentResched" class="table table-bordered table-sm font-nun table-striped">
                    <thead class="table-head text-center">
                        <tr>
                            <th>Appointment Number</th>
                            <th>School ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Document Requested</th>
                            <th>Date Requested</th>
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
            </div>
        </div>
    </div>

    <button id="back-to-top-btn" class="btn btn-custom show" style="color: #131313;">Back to top</button>
    <!-- review -->

    <script src="{{ asset('js/admin/appointment/info-display.js') }}"></script>
    <script>
        var url = "{{ url('') }}";
        // review
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
