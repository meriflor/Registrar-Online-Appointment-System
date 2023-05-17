<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubadminCashierController extends Controller
{
    public function viewCashierDashboard(){
        return view('subadmin-cashier-dashboard.content.dashboard');
    }

    public function viewCashierApproved(){
        return view('subadmin-cashier-dashboard.content.approved-payments');
    }

    public function viewCashierIncomplete(){
        return view('subadmin-cashier-dashboard.content.incomplete-payments');
    }
}
