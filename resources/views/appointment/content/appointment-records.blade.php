@extends('appointment.appointment')

@section('content')
    <div class="appointment-records" id="appointment-records">
        <div class="appointment-records-head">
            <p class="display-6 font-mont font-bold">Appointment Records</p>
        </div>
            <div class="appointment-records-lists mb-1">
                @if(count($appointments) > 0)
                <div class="accordion accordion-flush" id="appointment_record_list">
                    @foreach($appointments as $appointment)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#app-rec-{{ $appointment->id }}" aria-expanded="false" aria-controls="{{ $appointment->id }}">
                                {{ $appointment->form->name }}: {{ $appointment->created_at->format('M d, Y h:i A') }}
                        </h2>
                        <div id="app-rec-{{ $appointment->id }}"  class="accordion-collapse collapse" data-bs-parent="#appointment_record_list" >
                            <div class="accordion-body">
                                <div class="d-flex flex-row align-items-center row">
                                    <div class="col-md-6" style="flex: 1;">
                                        <p class="fs-6 m-0"><b>Status: </b>
                                        @php
                                            $has_resched = false;
                                            $has_remarks = false;
                                            foreach($bookings as $booking) {
                                                if($booking->appointment_id == $appointment->id && $booking->resched == 1) {
                                                    $has_resched = true;
                                                    $has_remarks = true;
                                                    $remarks = $booking->appointment->remarks;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        @if($has_resched)
                                            <span style="color: #f3f3f3; background-color: maroon;"><i><b>Reschedule</b></i></span>
                                        @else
                                            @if($appointment->status == 'Pending')
                                                <span style="color: #4a7453;"><i><b> Pending</b></i></span>
                                            @elseif($appointment->status == 'On Process')
                                                <span style="color: #3c8fad;"><i><b> On Process</b></i></span>
                                            @elseif($appointment->status == 'Ready to Claim')
                                                <span style="color: #c18930;"><i><b> Ready to Claim</b></i></span>
                                            @elseif($appointment->status == 'Claimed')
                                                <span style="color: maroon;"><i><b> Claimed</b></i></span>
                                            @endif
                                        @endif
                                            <!-- {{ $appointment->status }} -->
                                        </p>
                                    </div>
                                    @if ($appointment->status === 'Pending')
                                    <button id="cancel_app" class="btn cancel_app d-flex flex-row align-items-center col-md-6 w-auto flex-auto" type="button" data-bs-toggle="modal" data-bs-target="#cancelAppointmentModal" data-app-id="{{ $appointment->id }}">
                                        <img src="images/cancel.png" alt="cancel appointment">
                                        <p class="p-0 m-0">Cancel Appointment</p>
                                    </button>
                                    @endif
                                </div>
                                @if($has_remarks)
                                    <div class="d-flex flex-row p-2 mt-4" style="background-color: #80000021; border: 1px solid maroon;">
                                        <p class="m-0 p-0">REMARKS: <span class="m-0 p-0">{{ $remarks }}</span></p>

                                    </div>
                                @endif
                                <div class="receipt-box p-3 my-3" id="my-div-{{ $appointment->id }}">
                                    <div class="receipt-content fs-6 d-flex flex-column font-mont">
                                        <div class="content-head d-flex flex-column">
                                            <small class="font-bold">Mindanao State University - Maigo School of Arts and Trades</small>
                                            <small>msumsat.edu.ph</small>
                                        </div>
                                        <div class="content-body mt-5">
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Date Filled: </small>
                                                <small>{{ $appointment->created_at->format('M d, Y h:i A') }}</small>
                                            </div>
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Appointment Date: </small>
                                                <small>{{ $appointment->appointment_date}}</small>
                                            </div>
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Client Name: </small>
                                                <small>{{ $appointment->user->firstName }} {{ $appointment->user->middleName }} {{ $appointment->user->lastName }} {{ $appointment->user->suffix }}</small>
                                            </div>
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Appointment No.: </small>
                                                <small>{{ $appointment->booking_number }}</small>
                                            </div>
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Email: </small>
                                                <small>{{ $appointment->user->email }}</small>
                                            </div>
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Document Requested: </small>
                                                <small class="">{{ $appointment->form->name }}</small>
                                            </div>
                                            @if($appointment->form->pages > 1)
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Pages: </small>
                                                <small class="">At least {{ $appointment->form->pages }} pages</small>
                                            </div>
                                            @endif
                                            @if($appointment->num_copies > 1)
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Copies Requested: </small>
                                                <small class="">{{ $appointment->num_copies }} copies</small>
                                            </div>
                                            @endif
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                <small class="font-bold me-1">Tentative time to claim: </small>
                                                <small class="">{{ $appointment->form->form_max_time }} upon approving the request</small>
                                            </div>
                                            <div class="d-flex flex-wrap m-0 p-0">
                                                @if($appointment->form->pages > 1)
                                                <small class="font-bold me-1">Tentative Total Amount: </small>
                                                <small>PHP {{ $appointment->form->fee * $appointment->form->pages * $appointment->num_copies }}.00</small>
                                                @else
                                                <small class="font-bold me-1">Total Amount: </small>
                                                <small>PHP {{ $appointment->form->fee * $appointment->num_copies }}.00</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content-foot mt-5 d-flex flex-row align-items-center">
                                            <img src="/images/qrcode.png" alt="">
                                            <div class="d-flex flex-column m-0 p-0">
                                                <small style="font-size: 11px;">*Bring the necessary requirements and additional funds to cover the total amount</small>
                                                <small style="color: red;font-size: 11px;">Kindly take a screenshot of the receipt or access your account to present it to the registrar personnel. Alternatively, you may download and print the document for your reference.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                    <button id="download-button" class="btn user-button download-button" data-app-id="{{ $appointment->id }}">Download PDF</button>
                                    <button id="print-button" class="btn user-button ms-3 print-button" data-app-id="{{ $appointment->id }}">Print</button>
                                </div>
                                <!-- <div class="more-info d-flex flex-row row font-mont p-3">
                                    <div class="col-md-6">
                                        <small class="fs-6"><b>Purpose: </b>{{ $appointment->app_purpose }}</small>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-proof" data-bs-toggle="collapse" href="#proof-{{ $appointment->id }}" role="button" aria-expanded="false" aria-controls="proof">
                                        View Proof of Payment
                                        </a>
                                        <div class="collapse mt-2" id="proof-{{ $appointment->id }}">
                                            <img src="{{ asset($appointment->proof_of_payment) }}" alt="">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="appointment-records-lists">
                    <p>You have no bookings at the moment.</p>
                </div>
            @endif
        </div>
    </div>
@endsection