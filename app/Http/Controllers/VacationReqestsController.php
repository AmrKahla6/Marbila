<?php

namespace App\Http\Controllers;

use App\User;
use App\VactionRequest;
use Illuminate\Http\Request;

class VacationReqestsController extends Controller
{
    public function index(){
        $requests = VactionRequest::select('id','employee_id','vacationFrom','vacationTo','reason')->paginate(10);
        return view('requests.index',compact('requests'));
    }

    public function create(){
        $employees = User::select('id','name','hireDate')->get();
        return view('requests.create',compact('employees'));
    }

    public function getEmployeeInfo($id){
        // get records from database
        $employee = User::with('requests')->where('id',$id)->first();
        return response()->json(array('success' => true, 'employee' => $employee));
    }


    public function destroy($id){
        $vactionRequest = VactionRequest::find($id);
        $vactionRequest->delete();
        session()->flash('success','Request Vacation Deleted successfuly');
        return redirect()->back();
    }
}
