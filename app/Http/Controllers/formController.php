<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Models\Appointment;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class formController extends Controller
{

  public function createForm(Request $request){
        $request ->validate([
              'name' => 'required',
              'form_requirements'=>'required',
              'form_process'=>'required',
              'fee'=>'required',
              'form_avail'=>'required',
              'form_who_avail'=>'required',
              'form_max_time'=>'required',
        ]);
  
        $form = new Form();
        $form -> name = $request -> name;
        $form -> form_requirements = $request -> form_requirements;
        $form -> form_process = $request -> form_process;
        $form -> fee = $request -> fee;
        $form -> form_avail = $request -> form_avail;
        $form -> form_who_avail = $request -> form_who_avail;
        $form -> form_max_time = $request -> form_max_time;
        $form = $form -> save();
        if($form){
              return back()-> with ('success','Form created successfully');
        }else{
              return back()-> with('fail','Something wrong');
        }
  
  }
  

  public function viewForm(){
      $forms = Form::all();
      return view('admin-dashboard/forms', compact('forms'));
}

public function viewOneForm($id){
    $forms = Form::where('id', $id)->findOrFail($id);

    return response()->json([
          'name' => $forms->name,
          'form_requirements' => $forms->form_requirements,
          'form_who_avail' => $forms->form_who_avail,
          'form_process' => $forms->form_process,
          'fee' => $forms->fee,
          'form_avail' => $forms->form_avail,
          'form_max_time' => $forms->form_max_time
    ]);
}

public function editForm(Request $request){
    $forms = Form::find($request->formID);
    $forms->name = $request->editFormName;
    $forms->form_requirements = $request->editReq;
    $forms->form_process = $request->editProcessingTime;
    $forms->fee = $request->editDocFee;
    $forms->form_avail = $request->editAvailability;
    $forms->form_who_avail = $request->editAvailService;
    $forms->form_max_time = $request->editMaxTimeClaim;
    $forms->save();

    return response()->json(['success' => true, 'message' => 'The Forms is chu2.']);
}

public function delete(Request $request, $id){
      $forms = Form::find($id);
      
      if($forms){
            $forms->delete();
            return response()->json(['success' => true, 'message' => 'You have deleted successfully']);
      }return response()->json(['success' => false, 'message' => 'Were dead.']);
  }



}
