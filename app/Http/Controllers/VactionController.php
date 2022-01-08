<?php

namespace App\Http\Controllers;

use App\Vacation;
use Illuminate\Http\Request;
use App\Http\Requests\VacationRequest;

class VactionController extends Controller
{
    /**
     * Show all vacations
     */
    public function index(){
        $vactions = Vacation::select('id','holidayDate','holidayName')->latest()->paginate(10);
        return view('vactions.index',compact('vactions'));
    }

    /**
     * Store Vaction
     */

     public function store(VacationRequest $request){
        try {
            $validated = $request->validated();
             // Create New Vacation
             $data = $request->all();
             $employee = Vacation::create($data);
            session()->flash('success','Employee Added successfuly');
            return redirect()->back();
        } catch(\Exception $e) {
            session()->flash('error', ('Error'));
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
     }

    public function destroy($id){
        $vacation = Vacation::find($id);
        $vacation->delete();
        session()->flash('success','Vacation Deleted successfuly');
        return redirect()->back();
    }
}
