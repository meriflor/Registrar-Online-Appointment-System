@extends('subadmin-cashier-dashboard.subadmin-cashier')

@section('content')
    <div class="fs-2 font-bold font-nun mb-4" style="flex:1;">
        Approved Payments
    </div>
    <!-- small navigation -->
    <nav class="navigation this-box mb-3">
        <ul class="font-nun small-nav">
            <li><a href="#online_p">Online Payments</a></li>
            <li><a href="#walkin_p">Walk-in</a></li>
        </ul>
    </nav>
    <div class="p-shad-w p-4 mb-4" id="online_p">
        <h3 class="font-bold font-nun mb-4" style="flex:1;">
            Online Payments
        </h3>
        @if(count($bookings_onlinep) > 0)
        <table class="table font-nun hover display compact cell-border" id="onlineptable">
            <thead class="table-head text-center" style="font-size: 0.9rem;">
                <tr>
                    <th>Appointment Number</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Document Requested</th>
                    <th>Copies</th>
                    <th>Date Requested</th>
                    <th>Payment Method</th>
                    <th>Proof of Payment</th>
                    <th>Date Approved</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($bookings_onlinep as $booking)
                <tr class="text-center">
                    <td>{{ $booking->appointment->booking_number }}</td>
                    <td>{{ $booking->user->school_id }}</td>
                    <td>{{ $booking->user->lastName . ", " . $booking->user->firstName . " " . substr($booking->user->middleName, 0, 1) . ". ". $booking->user->suffix }}</td>
                    <td>{{ $booking->appointment->form->name }}</td>
                    <td>{{ $booking->appointment->num_copies }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->appointment->created_at)->format('F d, Y') }}</td>
                    @if($booking->appointment->payment_method === "Walk-in")
                    <td>{{ $booking->appointment->payment_method }}</td>
                    @else
                    <td style="background-color: #e5f3ff;" class="align-middle">{{ $booking->appointment->payment_method }}</td>
                    @endif
                    <td>
                        @if($booking->appointment->proof_of_payment == null)
                        None
                        @else
                        <a
                            type="button"
                            class="btn sub-admin-btn view-btn-pop"
                            id="{{ $booking->id }}"
                            >View
                        </a>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($booking->appointment->date_approved)->format('F d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="w-100 text-center">There's no approved payments yet.</div>
        @endif
    </div>

    <div class="p-shad-w p-4 mb-5" id="walkin_p">
        <h3 class="font-bold font-nun mb-4" style="flex:1;">
            Walk-in
        </h3>
        @if(count($bookings_walkinp) > 0)
        <table class="table font-nun hover display compact cell-border" id="walkintable">
            <thead class="table-head text-center" style="font-size: 0.9rem;">
                <tr>
                    <th>Appointment Number</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Document Requested</th>
                    <th>Copies</th>
                    <th>Date Requested</th>
                    <th>Date Approved</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($bookings_walkinp as $booking)
                <tr class="text-center">
                    <td>{{ $booking->appointment->booking_number }}</td>
                    <td>{{ $booking->user->school_id }}</td>
                    <td>{{ $booking->user->lastName . ", " . $booking->user->firstName . " " . substr($booking->user->middleName, 0, 1) . ". ". $booking->user->suffix }}</td>
                    <td>{{ $booking->appointment->form->name }}</td>
                    <td>{{ $booking->appointment->num_copies }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->appointment->created_at)->format('F d, Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->appointment->date_approved)->format('F d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="w-100 text-center">There's no approved payments yet.</div>
        @endif
    </div>
    
    <button id="back-to-top-btn" class="btn btn-custom show" style="color: #131313;">Back to top</button>
@endsection