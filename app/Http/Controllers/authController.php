<?php

namespace App\Http\Controllers;
use App\Models\Usersauth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\ProgramModel;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;

class authController extends Controller
{
    
//registry(view)
   public function registry()
   {
       return view('auth.registry');
   }

//registry(save)
   public function save(Request $request)
   {
    //validate
    // $request->validate([
    //     'name'=>'required',
    //     'lastName'=>'required',
    //     'email'=>'required|email|unique:users',
    //     'password'=>'required|min:5|max:12',
    //     'rePassword'=>'required|min:5|max:12'
    // ]);    
    if($request->password==$request->rePassword)
    {
        $user=new Usersauth;
        $user->name=$request->name;
        $user->lastName=$request->lastName;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);  
        $user->save();        
        return redirect('/auth/login')->with('success','Congratulations! Your registration is now complete, please log in!'); 
    }else{
        return back()->with('fail','something went wrong');
    }
   }

//login(view)
   public function login()
   {
       return view('auth.login');
   }
//login(check)
   public function check(Request $request)
   {
       //valid request inputs
       $request->validate([
           'email'=>'required|email',
           'password'=>'required|min:5|max:12'
       ]);
       $userInfo=Usersauth::where('email','=',$request->email)->first();       
       if(!$userInfo)
       {
           return back()->with('fail','we do not recognize your email address');
       }else
       {
            //check password
            if(Hash::check($request->password, $userInfo->password)&&$userInfo->role ==1){
                $request->session()->put('name',$userInfo->name);
                $request->session()->put('role',$userInfo->role);
                $request->session()->put('LoggedUser',$userInfo->id);
                return Redirect::route('userDashboard');
            }
            elseif(Hash::check($request->password, $userInfo->password)&&$userInfo->role ==0){
                $request->session()->put('name',$userInfo->name);
                $request->session()->put('role',$userInfo->role);
                $request->session()->put('LoggedUser',$userInfo->id);
                return Redirect::route('adminDashboard');
            }
            else{
                return back()->with('fail','incorrect password');
            }
       }
   }
   
//logout session
   public function logOut()
   {    
        if(session()->has('LoggedUser')){
            session()->flush();
            return redirect('/auth/login');
        }else{
            return back();
        }
   }

//edit user profile and change password (view)
   public function editProfile()
   {
        $id=session('LoggedUser');
        $user=Usersauth::where('id', $id)->first();
        return view('auth.user.editProfile',['user'=>$user]);
   }

//edit user profile and change password 
   public function updateProfile(Request $request)
   {
    
    $id=session('LoggedUser');
    $user=Usersauth::where('id', $id)->first();
    $user->name=$request->name;
    $user->lastName=$request->lastName;    
    if($request->password)
    {
        $request->validate([ 
            'password'=>'required|min:5|max:12',
            'rePassword'=>'required|min:5|max:12'
            ]);
            if(Hash::check($request->password, $user->password))
         {
            if($request->rePassword == $request->reNewPassword){
                $user->password=Hash::make($request->reNewPassword);
            }else{
                return back()->with('fail','passwords are not matched');
            }            
        }else{
            return back()->with('fail','Your old password was entered incorrectly, please try again');
        }
    }
    $user->save();
    return Redirect::route('userDashboard')->with('success','Your profile has been updated');
   }

// admin dashboard
   function adminDashboard()
   {
   
        $programModel=ProgramModel::all();
        $users=Usersauth::all();
    //   $users=Usersauth::find(2);
    //   $program=ProgramModel::find(10)->users;
    //     dd($program);
       
       
       return view('auth.admin.dashboard',['programModel'=>$programModel,'users'=>$users]);
   }

   function readUserPlan($id)
   {
       $userPlan=Usersauth::find($id)->program;
    //    foreach($userPlan as $plan)
    //    {
    //        dd($plan)
    //    }
       dd($userPlan);
     return view('auth.admin.userPlan',['userPlan'=>$userPlan]);
   }

// user dashboard
   function userDashboard()
   {
  
   
        
       return view('auth.user.dashboard');
   }


}
