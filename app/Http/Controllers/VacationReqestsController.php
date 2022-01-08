<?php

namespace App\Http\Controllers;

use App\User;
use App\Vacation;
use App\VactionRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RequestVacationRequest;

class VacationReqestsController extends Controller
{
    /**
     * Show all Vacation requests
     * show latest first
     */
    public function index(){

        //Select from DB
        $requests = VactionRequest::select('id','employee_id','vacationFrom','vacationTo','reason')->latest()->paginate(10);

        //send date to blade
        return view('requests.index',compact('requests'));
    }


    /**
     * Create blade to can store new vacation request
     */
    public function create(){
        //Select employees first to can choose
        $employees = User::select('id','name','hireDate')->get();

        //Send data to blade
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

            //Validate Data
            $validated = $request->validated();
             $data = $request->all();

             //Get all vacation from DB to check
             $vacations = Vacation::get();

             //Loop to can check
             foreach($vacations as $vacation){

                //if request date == vacation date return back with message
                 if($vacation->holidayDate == $request->vacationFrom || $vacation->holidayDate == $request->vacationTo){
                    session()->flash('error','This day is a vacation');
                    return redirect()->back();
                 }
             }


             //if it public vacation


             //Convert request date to sort time
             $vacationFrom    = strtotime($request->vacationFrom);

             //Convert sort time to day name
             $vacationFromDay = date('D', $vacationFrom);

             //if day name = "Fri" or "Sat" return back with message
             if($vacationFromDay == 'Fri' || $vacationFromDay == 'Sat'){
                session()->flash('error','This day is a public vacation choose another day');
                return redirect()->back();
             }

             //Convert date to sort time
             $vacationTo      = strtotime($request->vacationTo);

             //Convert sort time to day name
             $vacationToDay   = date('D', $vacationTo);

             //if day name = "Fri" or "Sat" return back with message
             if($vacationToDay == 'Fri' || $vacationToDay == 'Sat'){
                session()->flash('error','This day is a public vacation choose another day');
                return redirect()->back();
             }


             //Create new Vacation request
             $vacationRequest = VactionRequest::create($data);

             //Message for success operation
            session()->flash('success','Request Added successfuly');

            //return back to all vacation request
            return redirect()->route('vaction-requests');
        } catch(\Exception $e) {

            //Error message for any error happen
            session()->flash('error', ('Error'));

            //redirect back with this error
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id){

        //Find $id first
        $vactionRequest = VactionRequest::find($id);

        //Delete this request
        $vactionRequest->delete();

        //Success flash for this operation
        session()->flash('success','Request Vacation Deleted successfuly');

        //return back
        return redirect()->back();
    }
}
