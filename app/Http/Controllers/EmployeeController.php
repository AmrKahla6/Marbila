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
         return view('employees.show',compact('employee'));
     }
}
