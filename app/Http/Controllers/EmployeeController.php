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
        $employees = User::select('id','name','email','address')->latest()->paginate(10);
        return view('employees.index',compact('employees'));
    }

    /**
     * Create New Employee
     */

     public function create(){
         return view('employees.create');
     }

     /**
      * Store Employee
     */

     public function store(StoreRequest $request){
        try {
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
            session()->flash('success','Employee Added successfuly');
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
         $employee = User::findOrFail($id);
         $diff = abs(strtotime($employee->hireDate) - strtotime(date("Y-m-d")));

         //Hiring Format Date
         $years   = floor($diff / (365*60*60*24));
         $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
         $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

         if($years >= 30){
             $vacations_balance = 30;
         }else{
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
          $employee = User::find($id);
          if($employee->profileImage != '1.png'){
              Storage::disk('uploads')->delete('' . $employee->profileImage);
          }
          $employee->delete();
          session()->flash('success','Employee Deleted successfuly');
          return redirect()->back();
      }
}
