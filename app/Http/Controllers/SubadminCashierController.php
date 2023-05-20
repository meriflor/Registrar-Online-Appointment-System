<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\Booking;

class SubadminCashierController extends Controller
{
    public function viewCashierDashboard(){
        $bookings = Booking::whereHas('appointment', function ($query) {
                                    $query->where('payment_status', 'Pending');
                                })->get();
        return view('subadmin-cashier-dashboard.content.dashboard', compact('bookings'));
    }

    public function viewCashierApproved(){
        return view('subadmin-cashier-dashboard.content.approved-payments');
    }

    public function viewCashierIncomplete(){
        return view('subadmin-cashier-dashboard.content.incomplete-payments');
    }
}
