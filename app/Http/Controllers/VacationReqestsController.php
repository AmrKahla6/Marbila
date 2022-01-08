<?php

namespace App\Http\Controllers;

use App\User;
use App\Vacation;
use App\VactionRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RequestVacationRequest;

class VacationReqestsController extends Controller
{
    public function index(){
        $requests = VactionRequest::select('id','employee_id','vacationFrom','vacationTo','reason')->latest()->paginate(10);
        return view('requests.index',compact('requests'));
    }

    public function create(){
        $employees = User::select('id','name','hireDate')->get();
        return view('requests.create',compact('employees'));
    }

    /**
     * Response to get Employee info
     */

    public function getEmployeeInfo($id){
        // get records from database
        $employee = User::with('requests')->where('id',$id)->first();
        return response()->json(array('success' => true, 'employee' => $employee));
    }


    public function store(RequestVacationRequest $request){
        try {
            $validated = $request->validated();
             // Create New Vacation
             $data = $request->all();

             //Get vaction to check
             $vacations = Vacation::get();
             foreach($vacations as $vacation){
                 if($vacation->holidayDate == $request->vacationFrom || $vacation->holidayDate == $request->vacationTo){
                    session()->flash('error','This day is a vacation');
                    return redirect()->back();
                 }
             }

             $employee = VactionRequest::create($data);
            session()->flash('success','Request Added successfuly');
            return redirect()->route('vaction-requests');
        } catch(\Exception $e) {
            session()->flash('error', ('Error'));
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id){
        $vactionRequest = VactionRequest::find($id);
        $vactionRequest->delete();
        session()->flash('success','Request Vacation Deleted successfuly');
        return redirect()->back();
    }
}
