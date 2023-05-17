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
                Incomplete Payments
            </div>
            <!-- <div class="d-flex-row ">
                <button class="btn btn-request-records" id="export-app-records">Export</button>
            </div> -->
        </div>
        <!-- count -->
        <table
            class="table font-nun"
            id="appointmentRecords">
            <thead class="table-head text-center">
                <tr>
                    <th>Appointment Number</th>
                    <th>Student ID</th>
                    <th>Document Requested</th>
                    <th>Copies Requested</th>
                    <th>Date Requested</th>
                    <th>Payment Status</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <!-- foreach -->
                <tr class="text-center">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-view">
                        <a
                            type="button"
                            class="btn view-request p-0 view-btn"
                            id=""
                            >View</a
                        >
                    </td>
                </tr>
            <!-- end foreach -->
            </tbody>
        </table>
        <!-- else -->
            <tr>
                <td colspan="9" class="text-center">There's no claimed documents on our records yet.</td>
            </tr>
        <!-- endif -->
    </div>
@endsection