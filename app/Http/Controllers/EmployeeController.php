<?php

namespace App\Http\Controllers;

use Storage;
use App\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;

class EmployeeController extends Controller
{
    /**
     * Get All Emoloyees
     */
    public function index(){
        //Select this fileds from employee order by latest
        $employees = User::select('id','name','email','address')->latest()->paginate(10);

        //Send data to blade
        return view('employees.index',compact('employees'));
    }

    /**
     * Create New Employee
     */

     public function create(){
         //create blade to can store new employee
         return view('employees.create');
     }

     /**
      * Store Employee
     */

     public function store(StoreRequest $request){
        try {

            //Validate data first
            $validated = $request->validated();
            $data = $request->except(['profileImage']);

            //Validate hiring date
            $diff = abs(strtotime($request->hireDate) - strtotime($request->dateOfBirth));
            $years   = floor($diff / (365*60*60*24));


            // IF diffrent betweem birthday and hireing date > 18 years redirct back
            if($years < 18){
                session()->flash('error','The Diffrent betweem birthday and hireing date must be bigger than 18 years');
                return redirect()->back();
            }


            //Save Employee Image
            if ($request->profileImage) {
                Image::make($request->profileImage)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                    ->save(public_path('employees/' . $request->profileImage->hashName()));
                $data['profileImage'] = $request->profileImage->hashName();
             }else{
                $data['profileImage'] = '1.png';
             }

             // Create New Employee
             $employee = User::create($data);

             //Message for success operation
            session()->flash('success','Employee Added successfuly');

            //Return back to employee page
            return redirect()->route('employees');
        } catch(\Exception $e) {
            session()->flash('error', ('Error'));
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
     }


    /**
     * Show Employee
     * @param ID
     */

     public function show($id){

        //Find employee
         $employee = User::findOrFail($id);

         //How many year he work to determines days of vacation
         $diff = abs(strtotime($employee->hireDate) - strtotime(date("Y-m-d")));

         //Hiring Format Date
         $years   = floor($diff / (365*60*60*24));
         $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
         $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

         //if work years > 10 years his vacation 20 day

         if($years >= 10){
             $vacations_balance = 30;
         }else{
             //else his vacation 21
             $vacations_balance = 21;
         }

         // The number of vacation he had
         $vacation = count($employee->requests);

         //remaining holidays
         $holidays = $vacations_balance - $vacation;

         return view('employees.show',compact(['employee','years','months','days','vacations_balance','vacation','holidays']));
     }

     /**
      * Edit Blade
      */

     public function edit($id){

        //Find employee to edit
         $employee = User::find($id);
         return view('employees.edit',compact(['employee']));
     }

     /**
      * Update Employee
      */

      public function update(UpdateRequest $request, $id){
        try {
            //Validate Date
            $validated = $request->validated();

            // Find Employee
            $employee = User::find($id);
            $data = $request->except(['profileImage']);


            //Uplpad Image
            if ($request->profileImage) {

                //Delete Old Image from storage
                if ($employee->profileImage != '1.png') {
                    Storage::disk('uploads')->delete('' . $employee->profileImage);
                }

                Image::make($request->profileImage)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                    ->save(public_path('employees/' . $request->profileImage->hashName()));
                $data['profileImage'] = $request->profileImage->hashName();
            }


            //Update employee
            $employee->update($data);
            session()->flash('success',('Employee updated succesfuly'));
            return redirect()->route('employees');
            } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
      }

     /**
      * Delete Employee
      */

      public function destroy($id){

        //Find employee to delete
          $employee = User::find($id);

          //if his image != '1.png' delete image
          if($employee->profileImage != '1.png'){
              Storage::disk('uploads')->delete('' . $employee->profileImage);
          }

          //delete emoloyee
          $employee->delete();

          session()->flash('success','Employee Deleted successfuly');
          return redirect()->back();
      }
}
