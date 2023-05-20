@extends('subadmin-cashier-dashboard.subadmin-cashier')

@section('content')
    <div class="d-flex flex-row align-items-center mb-3">
        <a class="btn d-flex flex-row align-items-center" id="menu-btn">
            <img src="/images/back-arrow.png" alt="" />
            <p class="m-0 p-0 font-nun fs-6 ms-2" id="page-title">
                Dashboard
            </p>
        </a>
    </div>

    <div class="p-shad-w p-4">
        <div class="d-flex flex-row align-items-center">
            <div class="fs-2 font-bold font-nun mb-2" style="flex:1;">
                Pending Payments
            </div>
            <!-- <div class="d-flex-row ">
                <button class="btn btn-request-records" id="export-app-records">Export</button>
            </div> -->
        </div>
        <!-- count -->
        <table class="table font-nun hover display compact cell-border" id="appointmentRecords">
            <thead class="table-head text-center">
                <tr>
                    <th>Appointment Number</th>
                    <th>Student ID</th>
                    <th>Document Requested</th>
                    <th>Copies Requested</th>
                    <th>Reference Number</th>
                    <th>Date Requested</th>
                    <th>Payment Status</th>
                    <th>Proof of Payment</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($bookings as $booking)
                <tr class="text-center">
                    <td>{{ $booking->appointment->booking_number }}</td>
                    <td>{{ $booking->user->id }}</td>
                    <td>{{ $booking->appointment->form->name }}</td>
                    <td>{{ $booking->appointment->form->name }}</td>
                    <td></td>
                    <td></td>
                    <td>
                        
                    </td>
                    <td>
                        <a
                            type="button"
                            class="btn view-request p-0 view-btn"
                            id=""
                            >View
                        </a>
                    </td>
                    <td>
                        <div class="dropdown d-flex flex-column justify-contents-center">
                            <button class="btn sub-admin-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #1e1e1e;">
                                <li><a class="dropdown-item active" type="button" data-bs-toggle="modal" data-bs-target="#approve_payment_modal">Approve</a></li>
                                <li><a class="dropdown-item"  type="button" data-bs-toggle="modal" data-bs-target="#incomplete_payment_modal">Remarks</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" type="button" class="view-request view-btn" id="">
                                        View Information
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- else -->
            <tr>
                <td colspan="9" class="text-center">There's no claimed documents on our records yet.</td>
            </tr>
        <!-- endif -->
    </div>
@endsection