<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\User;
use App\Notifications\IncompletePaymentNotif;
use App\Notifications\ApprovedPaymentNotif;

class SubadminCashierController extends Controller
{
    public function viewCashierDashboard(){
        $bookings_onlinep = Booking::whereHas('appointment', function ($query) {
                                    $query->where('payment_status', 'Pending')->where('payment_method', 'Gcash');
                                })->get();
        $bookings_walkinp = Booking::whereHas('appointment', function ($query) {
                                    $query->where('payment_status', 'Pending')->where('payment_method', 'Walk-in');
                                })->get();
        return view('subadmin-cashier-dashboard.content.dashboard', compact('bookings_onlinep', 'bookings_walkinp'));
    }

    public function viewCashierApproved(){
        $bookings_onlinep = Booking::whereHas('appointment', function ($query) {
                                    $query->where('payment_status', 'Approved')->where('payment_method', 'Gcash');
                                })->get();
        $bookings_walkinp = Booking::whereHas('appointment', function ($query) {
                                    $query->where('payment_status', 'Approved')->where('payment_method', 'Walk-in');
                                })->get();
        return view('subadmin-cashier-dashboard.content.approved-payments', compact('bookings_onlinep', 'bookings_walkinp'));
    }

    public function viewCashierIncomplete(){
        $bookings_onlinep = Booking::whereHas('appointment', function ($query) {
                                    $query->where('payment_status', 'Incomplete')->where('payment_method', 'Gcash');
                                })->get();
        $bookings_walkinp = Booking::whereHas('appointment', function ($query) {
                                    $query->where('payment_status', 'Incomplete')->where('payment_method', 'Walk-in');
                                })->get();
        return view('subadmin-cashier-dashboard.content.incomplete-payments', compact('bookings_onlinep', 'bookings_walkinp'));
    }

    public function updatePaymentStatus(Request $request){
        $app_id = $request->app_id;
        $payment_status = $request->payment_status;
        $or_number = $request->or_number;
        $bookings = Booking::with('appointment')->find($app_id);
        if($payment_status == "incomplete"){
            $bookings->appointment->payment_status = "Incomplete";
            $bookings->appointment->save();

            $notif_type = "Incomplete Payment";
            $remarks = $request->input('remarks');
            $notification = new IncompletePaymentNotif($remarks, $app_id, $notif_type);
            $bookings->user->notify($notification);
        }else{
            $existingNotification = $bookings->user->notifications()
                ->where('data->app_id', $app_id)
                ->where('data->notif_type', 'Incomplete Payment')
                ->first();
            if($existingNotification){
                $existingNotification->delete();
            }
            $bookings->or_number = $or_number;
            $bookings->appointment->payment_status = "Approved";
            $bookings->appointment->date_approved = now();
            $bookings->appointment->save();
            $bookings->save();

            $notif_type = "Approved Payment";
            $remarks = "
            <pre class='font-mont p-5'>
                We are pleased to inform you that your payment for the requested document has been successfully approved.</br>
                Now that your payment has been approved, we would like to inform you that the next step in the document request process will be handled by the Registrar's Office. They will carefully process your request and work towards fulfilling it as soon as possible. Kindly note that further notices and updates regarding your document will be provided by the Registrar's Office.</br>
                In the meantime, we kindly request your patience and understanding. The Registrar's Office will keep you informed about the progress of your document request. Should you have any questions or require any assistance, please feel free to reach out to the Registrar's Office.</br>
                We appreciate the opportunity to assist you, and we look forward to delivering the requested document to you in a timely manner.
            </pre>
            ";
            $notification = new IncompletePaymentNotif($remarks, $app_id, $notif_type);
            $bookings->user->notify($notification);
        }
        // dd($app_id);
        
        return back();
    }

    public function getIncompleteRemarks($id){
        $booking = Booking::find($id);
        $user = $booking->user;
        $user_id = $user->id;

        $notifications = $user->notifications()
                    ->where('notifiable_id', $user_id)
                    ->where('data->app_id', $id)
                    ->where('data->notif_type', 'Incomplete Payment')
                    ->first();
        if ($notifications) {
            $remarks = $notifications->data['remarks'];
        } else {
            $remarks = null;
        }
    
        return response()->json([
            'remarks' => $remarks
        ]);
    }
}
