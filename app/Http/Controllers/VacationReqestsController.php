<?php

namespace App\Http\Controllers;

use App\VactionRequest;
use Illuminate\Http\Request;

class VacationReqestsController extends Controller
{
    public function index(){
        $requests = VactionRequest::select('id','employee_id','vacationFrom','vacationTo','reason')->paginate(10);
        return view('requests.index',compact('requests'));
    }
}
