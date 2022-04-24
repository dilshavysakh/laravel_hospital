<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function add_doctor()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }
            else{
                return redirect()->back(); 
            }
        }
        else
        {
            return redirect('login');
        }
        
    }
    public function upload_doctor(request $request)
    {
        $doctor=new Doctor();

        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
        $doctor->save();

        return redirect()->back()->with('message','Doctor added successfully!');
    }
    // public function show_appointment()
    // {
    //     $data=Appointment::all();
    //     return view('admin.admin_appointment',compact('data'));
    // }
    public function show_appointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data=Appointment::all();
                return view('admin.admin_appointment',compact('data'));
            }
            else{
                return redirect()->back(); 
            }
        }
        else
        {
            return redirect('login');
        }
    }
    
    public function approved($id)
    {
        $data=Appointment::find($id);
        $data->status='Approved';
        $data->save();
        return redirect()->back();
    }

    public function cancelled($id)
    {
        $data=Appointment::find($id);
        $data->status='Cancelled';
        $data->save();
        return redirect()->back();
    }

    // public function showdoctor()
    // {
    //     $data=Doctor::all();
    //     return view('admin.admin_showdoctor',compact('data'));
    // }
    public function showdoctor()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data=Doctor::all();
                return view('admin.admin_showdoctor',compact('data'));
            }
            else{
                return redirect()->back(); 
            }
        }
        else
        {
            return redirect('login');
        } 
    }
    

    public function dlt_doctor($id)
    {
        $data=Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_doctor($id)
    {
        $doctor=Doctor::find($id);
        return view('admin.update_doctor',compact('doctor'));
    }

    public function updated_doctor(request $request,$id)
    {
        $doctor=Doctor::find($id);

        $image=$request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('doctorimage',$imagename);
            $doctor->image=$imagename;
        }

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;
        $doctor->save();

        return redirect()->back()->with('message','Doctor Updated Successfully!');
    } 

    public function emailview($id)
    {
        $data=Appointment::find($id);
        return view('admin.emailview',compact('data'));
    }

    public function sendemail(request $request,$id)
    {
        $data=Appointment::find($id);
        $details=[
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];
        Notification::send($data,new 
        SendEmailNotification($details));

        return redirect()->back()->with('message','Mail sent Successfully!');
    } 
}
