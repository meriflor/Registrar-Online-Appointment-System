@extends('admin-dashboard.admin')

@section('content')
    <!-- header -->
    <div class="d-flex flex-row align-items-center mb-3">
        <a class="btn d-flex flex-row align-items-center" id="menu-btn">
            <img src="/images/back-arrow.png" alt="" />
            <p class="m-0 p-0 font-nun fs-6 ms-2" id="page-title">
                Dashboard
            </p>
        </a>
    </div>

    <!-- small navigation -->
    <nav class="navigation this-box mb-3">
        <ul class="font-nun small-nav">
            <li><a href="#appRec">Appointment Records</a></li>
            <li><a href="#">Print Records</a></li>
        </ul>
    </nav>

    <div id="dashboard-content">
        <div class="row d-flex flex-row">
            <div class="col-md-4">
                <div id="track-boxes" class="track-boxes mb-3" style="padding: 0 10px 0 0;">
                    <div class="p-shad-w">
                        <h5 class="font-nun font-bold">Today: {{ ($current_day) }} </h5>
                        <ul class="list-group list-group-flush">
                            @if(count($formCounts) > 0)
                            @foreach($formCounts as $formName => $count)
                            <li class="list-group-item py-3 px-4 font-nun row d-flex flex-row align-items-center justify-content-between">
                                <p class="p-0 m-0 doc-title flex-1 col-9">
                                    {{ ($formName ) }}
                                </p>
                                <span class="col-3 badge badge-dash-custom d-flex flex-row justify-content-center">{{ ($count ) }}</span>
                            </li>
                            @endforeach
                            @else
                            <li class="list-group-item py-3 px-4 font-nun row d-flex flex-row align-items-center justify-content-between">
                                No appointments for this day. 
                            </li>
                            @endif
                        </ul>
                    </div>
                    
                    @foreach($futureDocs as $futureDate => $appointments)
                        <div class="p-shad-w mt-3">
                            <h5 class="font-nun font-bold">On: {{ \Carbon\Carbon::parse($futureDate)->format('M d, Y') }}</h5>
                            <ul class="list-group list-group-flush">
                                @foreach($appointments->groupBy('form.name') as $formName => $groupedAppointments)
                                    <li class="list-group-item py-3 px-4 font-nun row d-flex flex-row align-items-center justify-content-between">
                                        <p class="p-0 m-0 doc-title flex-1 col-9">
                                            {{ $formName }}
                                        </p>
                                        <span class="col-3 badge badge-dash-custom d-flex flex-row justify-content-center">
                                            {{ $groupedAppointments->count() }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <div id="cal-box" class="cal-box p-4 mb-3">
                    <h4 class="m-0 font-nun">Scheduling Calendar</h4>
                    <small class="m-0 font-nun">Set a day for appointment slot</small>
                    <div class="d-flex flex-row flex-wrap justify-content-end mb-2 font-nun">
                        <div class="avai-sect mx-2 d-flex flex-row align-items-center">
                            <div class="legend-box fc-today-01 me-1"></div>
                            <small class="p-0">Today</small>
                        </div>
                        <div class="full-sect mx-2 d-flex flex-row align-items-center">
                            <div class="legend-box fc-event-full me-1"></div>
                            <small class="p-0">Full</small>
                        </div>
                        <div class="avai-sect mx-2 d-flex flex-row align-items-center">
                            <div class="legend-box fc-event-available me-1"></div>
                            <small class="p-0">Available</small>
                        </div>
                        <div class="avai-sect mx-2 d-flex flex-row align-items-center">
                            <div class="legend-box fc-disabled-01 me-1"></div>
                            <small class="p-0">Disabled</small>
                        </div>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="space my-4"></div>
        <div class="row d-flex flex-row m-2" id="appRec">
            <div class="appointment-records p-4">
                <div class="d-flex flex-row align-items-center">
                <div class="fs-2 font-bold font-nun mb-2" style="flex:1;">
                    Appointment Records
                </div>
                <div class="d-flex-row ">
                    <button class="btn btn-request-records" id="export-app-records">Export</button>
                </div>
            </div>
                @if(count($bookings)>0)
                <table
                    class="table font-nun"
                    id="appointmentRecords">
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
                    </tbody>
                </table>
                @else
                    <tr>
                        <td colspan="9" class="text-center">There's no claimed documents on our records yet.</td>
                    </tr>
                @endif
            </div>
        </div>
    </div>
    
    <button id="back-to-top-btn" class="btn btn-custom show" style="color: #131313;">Back to top</button>
@endsection
