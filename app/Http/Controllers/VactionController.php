<?php

namespace App\Http\Controllers;

use App\Vacation;
use Illuminate\Http\Request;

class VactionController extends Controller
{
    public function index(){
        $vactions = Vacation::select('id','holidayDate','holidayName','type')->paginate(10);
        return view('vactions.index',compact('vactions'));
    }
}
