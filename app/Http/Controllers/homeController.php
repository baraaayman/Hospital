<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class homeController extends Controller
{

    public function redirect()
    {

        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor=Doctor::all();
                return view('user.home',compact('doctor'));
            }
            else{
                return view('admin.home');
            }

        }else{
            return redirect()->back();
        }

    }

    public function index(){
        if(auth::id()){
            return redirect('home');
        }else{
        $doctor=Doctor::all();
        return view('user.home',compact('doctor'));
        }
    }

    public function appointment(Request $request){
        $data = new appointment();

            $data->name=$request->input('name');
            $data->email=$request->input('email');
            $data->date=$request->input('date');
            $data->doctor=$request->input('doctor');
            $data->phone=$request->input('phone');
            $data->message=$request->input('message');
            $data->status=$request='in progress';
            if(Auth::id())
            {

                $data->user_id=Auth::user()->id;
            };

            $data->save();
           return redirect()->back()->with('message','Appointment request Successful . We will contact with you soon');
    }

    public function My_Appoinment()
    {
        if(Auth::id()){
            if(Auth::user()->usertype==0){

                $userid=Auth::user()->id;
                $appointment=appointment::where('user_id',$userid)->get();
                return view('user.MyAppoinment',compact('appointment'));
            }else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }
    public function cancel_appointment($id)
    {
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
