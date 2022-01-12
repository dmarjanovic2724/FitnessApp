<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Usersauth;
use App\Models\ProgramModel;
use App\Models\Plan;

class planController extends Controller
{
    //create plan
    function createPlan(Request $request)
    {
       
        $program=ProgramModel::where('id',$request->selecProg)->get()->first();
        $programName=$program->programName;
        $userName=Usersauth::where('id', $request->selectUser)->get()->first();
        $name=$userName->name;
    //save to table Plan
        $plan=new Plan;
        $plan->user_id=$request->selectUser;
        $plan->program_id=$request->selecProg;
        $plan->save();

        return back()->with('success','Congratulations!'. $programName .' is sent to'.$name); 

    }
}
