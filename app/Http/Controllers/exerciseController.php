<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class exerciseController extends Controller
{
    //
    public function exercise()
    {
        $data=Exercise::all();
        return view('exercise.exercise',compact('data'));
    }

    public function addNewExerciseView()
    {
      
        return view('exercise.addNewExercise');
    }

    public function addNewExercise(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $exercise=new Exercise;
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('exercises'),$imageName);
        $exercise->name=$request->name;
        $exercise->type=$request->type;
        $exercise->level_1=$request->level_1;
        $exercise->level_2=$request->level_2;
        $exercise->level_3=$request->level_3;
        $exercise->description=$request->description;
        $exercise->image=$imageName;
        $exercise->save();

        return back()->with('success','exercise added successfull');
    }

    public function exerciseEdit($id)
    {
        $data=Exercise::find($id);
        return view('exercise.exerciseEdit',['data'=>$data]);
    }


    public function ecerciseSave(Request $request, $id)
    {
        $exercise=Exercise::where('id','=',$id)->first();
        // $imageName = $request->file('image')->getClientOriginalName();
        // $request->file('image')->move(public_path('exercises'),$imageName);
        $exercise->name=$request->name;
        $exercise->type=$request->type;
        $exercise->level_1=$request->level_1;
        $exercise->level_2=$request->level_2;
        $exercise->level_3=$request->level_3;
        $exercise->description=$request->description;        
        // $exercise->image=$imageName;
        $exercise->save();
       

        return Redirect::route('exerciseList')->with('success','exercise update is successfull');
    }

}
