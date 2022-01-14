<?php

namespace App\Http\Controllers;
use App\Models\ProgramModel;
use App\Models\Exercise;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class programController extends Controller
{

//view Create program
    function createProgramView()
    {   
        $data=Exercise::all();
        return view('program.createProgram',['data'=>$data]);
    }

//create workout program 
    function createProgram(Request $request)
    {  
        $programExisted=ProgramModel::where('programName','=',$request->programName)->first();
        
        if($programExisted)
        {
            return back()->with('fail', 'program with name '.$request->programName.' allready existes');
        }else
        
        $request->validate([
        'methods'=>'required',
        'programName'=>'required',
        'selected'=>'required'
    ]);
        $program=new ProgramModel;
        $program->methods=$request->methods;  
        $program->programName=$request->programName;      
        $ids=json_encode($request->selected);        
        $program->exercises=$ids;
        $program->save();
        return back()->with('success', 'program '.$request->method.' was created');        
        }
    
    
//view program list
    public function programsList()
    {
        $program=ProgramModel::all();
        return view('program.programList',['programs'=>$program]);
    }

//read selected program
    function program($id)
    {
       
        $program=ProgramModel::all()->where('id', '=', $id)->first(); 
        $programName=$program->programName;         
        $methods=$program->methods;       
        $data=json_decode($program->exercises);        
        
        $exercise=[];
        
        foreach($data as $item)
        {
            // dd($item);
            $exercise[]=Exercise::all()->where('id','=',$item);
        }
       
        $data=[];
        foreach($exercise as $item)
        {
            foreach($item as $exercise)
            {
               $data[]=$exercise;
            }
        }

        $data=$data;

         
          
       return view('program.program',['data'=>$data,'methods'=>$methods,'programName'=>$programName]);
    }

// view edit page for selected program
    public function programEdit($id)
    {
        $id=ProgramModel::find($id);
        $exerciseList=Exercise::all();
        $progId=$id->id;
        //
        $program=ProgramModel::all()->where('id', '=', $progId)->first();        
        $methods=$program->methods;       
        $data=json_decode($program->exercises);        

        $exercise=[];
        foreach($data as $item)
        {
            $exercise[]=Exercise::all()->where('id','=',$item);
        }
       $data=[];
        foreach($exercise as $item)
        {
            foreach($item as $exercise)
            {
               $data[]=$exercise;
            }
        }
        return view('program.programEdit',['program'=>$id,'exercise'=>$data,'exerciseList'=>$exerciseList]);
    }

// update selected program
    public function programUpdate(Request $request, $id)
    {
        $program=ProgramModel::where('id','=',$id)->first();             
        $program->methods=$request->methods;  
        $program->programName=$request->programName;      
        $ids=json_encode($request->selected);        
        $program->exercises=$ids;
        $program->save();
        return back()->with('success', 'program '.$request->programName.' was updated');
    }
}



