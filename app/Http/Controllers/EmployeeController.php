<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Get All Emoloyees
     */
    public function index(){
        $employees = User::select('id','name','email','address')->paginate(10);
        return view('employees.index',compact('employees'));
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
}
