<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id())
        {
            if(Auth::user()->usertype=="0"){
                $doctor=Doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index(){
        if(Auth::id()){
            return redirect()->back();
        }
        else{
            $doctor=Doctor::all();
            return view('user.home',compact('doctor'));
        }
        
    }

    public function appointment(request $request){
        $data=new Appointment();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->phone;     
        $data->doctor=$request->doctor;
        $data->message=$request->message;
        
        $data->status='In Progress';

        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('alert','Your Request Successful. We Will Contact You Soon!');
        
    }
    public function myappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==0)
            {
                $user_id=Auth::user()->id;
                $appoint=Appointment::where('user_id',$user_id)->get();

                return view('user.my_appointment',compact('appoint'));
            }
            else{
                return redirect('login');
            }
        }
        else{
            return redirect()->back();
        }

    }

    public function cancel_appoint($id){
        $data=Appointment::find($id);
        $data->delete();

        return redirect()->back();
        
    }

}
