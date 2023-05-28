@extends('appointment.appointment')

@section('content')


<p class="display-6 font-mont font-bold">Notifications</p>
@if(count($notifications) > 0)
    @foreach($notifications as $notification)
        @if($notification->data['notif_type'] == "Incomplete Payment")
        <div class="notification p-4 mb-4">
            <div class="d-flex flex-column align-items-start">
                <div class="d-flex flex-row align-items-center">
                    <p class="fs-6 m-0 me-2"> 
                        <span class="font-bold" style="color:maroon;">Incomplete Payment Notice</span>
                    </p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <small>{{ $notification->created_at->diffForHumans() }} 
                        <span>
                            <a style="color: #1e1e1e;" data-bs-toggle="collapse" href="#{{ $notification->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                View Notification
                            </a>
                        </span>
                    </small>
                </div>
            </div>
            
            <div class="collapse" id="{{ $notification->id }}">
                <p class="px-5 py-4">{{ $notification->data['remarks'] }}</p>
                <div class="d-flex flex-row justify-content-end">
                    @foreach($bookings as $booking)
                        @if($booking->appointment_id == $notification->data['app_id'] && $booking->resched == 1 )
                        <button class="btn notif-btn resched_btn" id="resched_btn" data-form-name="{{ $booking->appointment->form->name }}" data-form-max-claim="{{ $booking->appointment->form->form_max_time }}" data-app-id="{{ $booking->appointment_id }}">
                            Re-Schedule
                        </button>
                        @endif
                    @endforeach
                </div>
                <div class="">
                    <h5 class="m-0">Appointment Detail</h5>
                    <hr>
                    @foreach($bookings as $booking)
                    @if($notification->data['app_id'] == $booking->id)
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Document Requested:</span>  
                        <span>  {{ $booking->appointment->form->name }}</span>
                    </p>
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Date Requested:</span>  
                        <span>  {{ $booking->appointment->created_at->format('M d, Y') }}</span>
                    </p>
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Appointment Date:</span>  
                        <span>  {{ $booking->appointment->appointment_date }}</span>
                    </p>
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Payment Method:</span>  
                        <span>  {{ $booking->appointment->payment_method }}</span>
                    </p>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @elseif($notification->data['notif_type'] == "Approved Payment")
        <div class="notification p-4 mb-4">
            <div class="d-flex flex-column align-items-start">
                <div class="d-flex flex-row align-items-center">
                    <p class="fs-6 m-0 me-2"> 
                        <span class="font-bold" style="color:green;">You're payment has been Approved.</span>
                    </p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <small>{{ $notification->created_at->diffForHumans() }} 
                        <span>
                            <a style="color: #1e1e1e;" data-bs-toggle="collapse" href="#{{ $notification->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                View Notification
                            </a>
                        </span>
                    </small>
                </div>
            </div>
            
            <div class="collapse" id="{{ $notification->id }}">
                {!! $notification->data['remarks'] !!}
                <div class="d-flex flex-row justify-content-end">
                <form action="{{ route('notif-delete', ['id' => $notification->data['app_id'], 'notif_type' => $notification->data['notif_type']]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn notif-btn" id="delete_btn">
                            Delete
                        </button>
                    </form>
                </div>
                <div class="">
                    <h5 class="m-0">Appointment Detail</h5>
                    <hr>
                    @foreach($bookings as $booking)
                    @if($notification->data['app_id'] == $booking->id)
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Document Requested:</span>  
                        <span>  {{ $booking->appointment->form->name }}</span>
                    </p>
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Date Requested:</span>  
                        <span>  {{ $booking->appointment->created_at->format('M d, Y') }}</span>
                    </p>
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Appointment Date:</span>  
                        <span>  {{ $booking->appointment->appointment_date }}</span>
                    </p>
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Payment Method:</span>  
                        <span>  {{ $booking->appointment->payment_method }}</span>
                    </p>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="notification p-4 mb-4">
            <div class="d-flex flex-column align-items-start">
                <div class="d-flex flex-row align-items-center">
                    <p class="fs-6 m-0 me-2"> 
                        <span class="font-bold">{{ $notification->data['title'] }} </span>
                        <span>  {{ $notification->data['doc'] }}</span>
                    </p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <small>{{ $notification->created_at->diffForHumans() }} 
                        <span>
                            <a style="color: #1e1e1e;" data-bs-toggle="collapse" href="#{{ $notification->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                View Notification
                            </a>
                        </span>
                    </small>
                </div>
            </div>
            
            <div class="collapse" id="{{ $notification->id }}">
                <p class="px-5 py-4">{{ $notification->data['remarks'] }}</p>
                <div class="d-flex flex-row justify-content-end">
                    @foreach($bookings as $booking)
                        @if($booking->appointment_id == $notification->data['app_id'] && $booking->resched == 1 )
                        <button class="btn notif-btn resched_btn" id="resched_btn" data-form-name="{{ $booking->appointment->form->name }}" data-form-max-claim="{{ $booking->appointment->form->form_max_time }}" data-app-id="{{ $booking->appointment_id }}">
                            Re-Schedule
                        </button>
                        @endif
                    @endforeach
                </div>
                <div class="">
                    <h5 class="m-0">Appointment Detail</h5>
                    <hr>
                    @foreach($appointments as $appointment)
                    @if($notification->data['app_id'] == $appointment->id)
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Date Requested:</span>  
                        <span>  {{ $appointment->created_at->format('M d, Y') }}</span>
                    </p>
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Appointment Date:</span>  
                        <span>  {{ $appointment->appointment_date }}</span>
                    </p>
                    <p class="fs-6 m-0 mt-2">
                        <span class="font-bold">Payment Method:</span>  
                        <span>  {{ $appointment->payment_method }}</span>
                    </p>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    @endforeach
@else
    <div>You have no notifications as of now.</div>
@endif

<script>
    
    
</script>
    
@endsection