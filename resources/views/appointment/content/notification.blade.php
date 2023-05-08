@extends('appointment.appointment')

@section('content')


<p class="display-6 font-mont font-bold">Notifications</p>
@if(count($notifications) > 0)
    @foreach($notifications as $notification)
        <div class="notification p-4 mb-4">
            <div class="d-flex flex-column align-items-start">
                <div class="d-flex flex-row align-items-center">
                    <p class="fs-6 m-0 font-bold me-2">
                    {{ $notification->data['title'] }} 
                    </p>
                    <span>  {{ $notification->data['doc'] }}</span>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <small>{{ $notification->created_at->diffForHumans() }} 
                        <span>
                            <a style="color: #1e1e1e;" data-bs-toggle="collapse" href="#{{ $notification->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                View Appointment
                            </a>
                        </span>
                    </small>
                </div>
            </div>
            
            <p class="px-5 py-4">{{ $notification->data['remarks'] }}</p>

            <div class="d-flex flex-row justify-content-end">
                @foreach($bookings as $booking)
                @if($booking->appointment_id == $notification->data['app_id'] && $booking->resched == 1 )
                <a class="btn notif-btn" id="resched_btn">
                    Re-Schedule
                </a>
                @endif
                @endforeach
                
                
            </div>
            <div id="{{ $notification->id }}" class="collapse">
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
    @endforeach
@else
    <div>You have no notifications of now.</div>
@endif

{{ $notifications->links() }}
<script>
    $('#resched_btn').on('click', fucntion(){
        $('#re_sched_modal').modal('show');
    });
</script>
    
@endsection