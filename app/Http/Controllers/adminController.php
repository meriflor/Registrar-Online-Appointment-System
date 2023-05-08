<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Models\Announcement;
use App\Models\Appointment;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

use App\Notifications\AppRemarksUpdate;

class adminController extends Controller
{
    public function viewApp($id){
        $booking = Booking::with('user', 'appointment.form')->findOrFail($id);
        $fullName = $booking->user->lastName . ', ' . $booking->user->firstName;
        if ($booking->user->middleName) {
            $fullName .= ' ' . $booking->user->middleName;
        }if ($booking->user->suffix) {
            $fullName .= ' ' . $booking->user->suffix;
        }

        return response()->json([
            'fullName' => $fullName,
            'address' => $booking->user->address,
            'school_id' => $booking->user->school_id,
            'cell_no' => $booking->user->cell_no,
            'civil_status' => $booking->user->civil_status,
            'email' => $booking->user->email,
            'birthdate' => Carbon::parse($booking->user->birthdate)->format('F j, Y'),
            'status' => $booking->user->status,
            'gender' => $booking->user->gender,
            'course' => $booking->user->course,
            'acadYear' => $booking->user->acadYear,
            'gradYear' => $booking->user->gradYear,

            'app_purpose' => $booking->appointment->app_purpose,
            'doc_req_year' => $booking->appointment->acad_year,
            'doc_name' => $booking->appointment->form->name,
            'doc_created' => Carbon::parse($booking->user->created_at)->format('F j, Y'),
            'appointment_date' => $booking->appointment->appointment_date,
            'booking_number' => $booking->appointment->booking_number,
            'a_transfer' => $booking->appointment->a_transfer,
            'a_transfer_school' => $booking->appointment->a_transfer_school,
            'b_transfer' => $booking->appointment->b_transfer,
            'b_transfer_school' => $booking->appointment->b_transfer_school,
            'remarks' => $booking->appointment->remarks,

            'doc_fee' => $booking->appointment->form->fee,
            'payment_method' => $booking->appointment->payment_method,
            'proof_of_payment' => $booking->appointment->proof_of_payment,
        ]);
    }

    public function updateStatusAccept(Request $request){
        $appointments = Appointment::find($request->id);
        if ($appointments) {
            if ($appointments->status === "Pending") {
                $appointments->status = $request->status;
                $appointments->save();
            } else {
                return response()->json(['message' => 'Appointment status is not pending.'], 404);
            }
        } else {
            return response()->json(['message' => 'Appointment not found.'], 404);
        }
    }public function updateStatusDone(Request $request){
        $appointments = Appointment::find($request->id);
        if ($appointments) {
            if ($appointments->status === "On Process") {
                $appointments->status = $request->status;
                $appointments->save();
            } else {
                return response()->json(['message' => 'Appointment status is not pending.'], 404);
            }
        } else {
            return response()->json(['message' => 'Appointment not found.'], 404);
        }
    }public function updateStatusClaimed(Request $request){
        $appointments = Appointment::find($request->id);
        if ($appointments) {
            if ($appointments->status === "Ready to Claim") {
                $appointments->status = $request->status;
                $appointments->save();
            } else {
                return response()->json(['message' => 'Appointment status is not pending.'], 404);
            }
        } else {
            return response()->json(['message' => 'Appointment not found.'], 404);
        }
    }

//review =================================== Revised =================================================================
    public function viewAdminRecords(Request $request){
        $bookings = Booking::with('user', 'appointment')
                ->where('resched', 0)
                ->whereHas('appointment', function ($query) {
                    $query->where('status', 'claimed');
                })->get();


        $current_day = Carbon::today()->format('F d, Y');
        $todayDocs = Appointment::with('form')->where('appointment_date', '=', $current_day)->get();
        
        $futureDocs = Appointment::with('form')
                ->where('appointment_date', '>',  $current_day)
                ->where('status', 'Pending')
                ->whereHas('bookings', function ($query) {
                    $query->where('resched', 0);
                })
                ->orderBy('appointment_date', 'asc')
                ->get()
                ->groupBy('appointment_date');

        $formFutureCounts = collect([]);

        foreach ($futureDocs as $date => $appointments) {
            $counts = $appointments->groupBy('form.name')->map(function ($appointments) {
                return $appointments->count();
            });


            $formFutureCounts = $formFutureCounts->merge($counts->map(function ($count, $formName) use ($date) {
                return [ 
                    'form_name' => $formName,
                    'date' => $date,
                    'count' => $count
                ];
            }));
        }


        $formFutureCounts = $formFutureCounts->groupBy('form_name');
        
        $formCounts = $todayDocs->groupBy('form.name')->map(function ($appointments) {
            return $appointments->count();
        });
        
        return view('admin-dashboard.dashboard', compact('bookings', 'todayDocs', 'futureDocs', 'current_day', 'formCounts'));
    }


        
    //review ========================Returning Pending Request with Specific Date====================================
    public function viewAdminRequest(Request $request, $date){
        $selectedDate = Carbon::parse($date)->format('F d, Y');

        $pending = Booking::with('user', 'appointment')
                        ->where('resched', 0)
                        ->whereHas('appointment', function($query) use($selectedDate){
                            $query->where('appointment_date', $selectedDate)->where('status', 'Pending');
                        })->get();

        $onprocess = Booking::with('user', 'appointment')
                        ->where('resched', 0)
                        ->whereHas('appointment', function($query) use($selectedDate){
                            $query->where('appointment_date', $selectedDate)->where('status', 'On Process');
                        })->get();

        $ready = Booking::with('user', 'appointment')
                        ->where('resched', 0)
                        ->whereHas('appointment', function($query) use($selectedDate){
                            $query->where('appointment_date', $selectedDate)->where('status', 'Ready to Claim');
                        })->get();

        $claimed = Booking::with('user', 'appointment')
                        ->where('resched', 0)
                        ->whereHas('appointment', function($query) use($selectedDate){
                            $query->where('appointment_date', $selectedDate)->where('status', 'Claimed');
                        })->get();

        return view('admin-dashboard.request', compact('pending', 'onprocess', 'ready', 'claimed'));
    }

    //review ===========================Returning all request ===========================================================
    public function viewAllRequest(Request $request){
        $bookings = Booking::with('user', 'appointment')
                            ->where('resched', 0)
                            ->whereDoesntHave('appointment', function ($query) {
                                $query->where('status', 'claimed');
                            })->get();
        return view('admin-dashboard.request-all', compact('bookings'));
    }

    public function viewAllResched(Request $request){
        $bookings = Booking::with('user', 'appointment')
                            ->where('resched', 1)
                            ->whereDoesntHave('appointment', function ($query) {
                                $query->where('status', 'claimed');
                            })->get();
        return view('admin-dashboard.request-resched', compact('bookings'));
    }

    public function updateRemark(Request $request){
        $app_id = $request->input('app_id');
        $appointment = Appointment::find($app_id);
        // dd($request->input('remarks'));
        $appointment->remarks = $request->input('remarks');
        $appointment->save();
        // Create a new notification and store it in the database
        $notif_type = $request->input('notif_type');
        $doc = $request->input('doc');
        $resched = $request->input('resched_check');
        $title = $request->input('title');

        $bookings = Booking::where('appointment_id', $app_id)->first();
        if($resched == null){
            $bookings->resched = 0;
        }else{
            
            $bookings->resched = $resched;
        }
        $bookings->save();

        $existingNotification = $appointment->user->notifications()
            ->where('data->app_id', $app_id)
            ->first();
        if($existingNotification){
            $existingNotification->delete();
        }
        $notification = new AppRemarksUpdate($appointment->remarks, $app_id, $notif_type, $title, $doc, $resched);
        $appointment->user->notify($notification);
        
        return redirect()->back();
    }
}
