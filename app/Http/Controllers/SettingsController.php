<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrarStaff;
use App\Models\User;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function registrarStaffStore(Request $request){
        $staffs = new RegistrarStaff();
        $staffs->full_name = $request->add_staff_name;
        $staffs->position = $request->add_staff_position;

        if($request->hasFile('add_staff_img')){
            $profile_image = $request->file('add_staff_img');
            if($profile_image->isValid()){
                $timestamp = time();
                $fileName = $timestamp . '_' . $profile_image->getClientOriginalName();
                $pop_path = $profile_image->move(public_path('images/registrar-staff'), $fileName);
                $staffs->profile_image = 'images/registrar-staff/'.$fileName;
            }else {
                return response()->json(['error' => 'Invalid file'], 400);
            }
        }else {
            return response()->json(['error' => 'You have not uploaded an image.'], 400);
        }
        $staffs->save();
        return redirect('/dashboard-admin/settings');
    }

    public function registrarStaffUpdate(Request $request, $id){
        $staffs = RegistrarStaff::find($id);
        $staffs->full_name = $request->update_staff_name;
        $staffs->position = $request->update_staff_position;
        if($request->hasFile('update_staff_img')){
            $profile_image = $request->file('update_staff_img');
            if($profile_image->isValid()){
                $timestamp = time();
                $fileName = $timestamp . '_' . $profile_image->getClientOriginalName();
                $pop_path = $profile_image->move(public_path('images/registrar-staff'), $fileName);
                $staffs->profile_image = 'images/registrar-staff/'.$fileName;
            }else {
                return response()->json(['error' => 'Invalid file'], 400);
            }
        }
        $staffs->save();
        return redirect('/dashboard-admin/settings');
    }

    public function registrarStaffDelete(Request $request, $id){
        $staffs = RegistrarStaff::find($id);
        $staffs->delete();
        return redirect('/dashboard-admin/settings');
    }

    public function adminContactUpdate(Request $request, $id){
        $admin = User::find($id);
        $admin->email = $request->update_admin_email;
        $admin->cell_no = $request->update_admin_cp_no;
        $admin->save();
        return redirect('/dashboard-admin/settings');
    }
}
