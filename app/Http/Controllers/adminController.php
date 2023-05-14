<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class adminController extends Controller
{
    public function addview(){
        if(Auth::id()){

            if(Auth::user()->usertype==1)
            {

                return view('admin.add_doctor');
            }
            else
            {
                return redirect()->back();
            }

        }
        else
        {
            return redirect()->route('login');
        }

    }
    public function upload(Request $request)
    {
            $doctor=new  Doctor;
            $image=$request->file;
            $imagename=time().'.'.$image->getClientoriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;

            $doctor->name=$request->input('name');
            $doctor->phone=$request->input('phone');
            $doctor->speciality=$request->input('Speciality');
            $doctor->room=$request->input('room');

            $doctor->save();
            return redirect()->back()->with('message','Doctor Add Successfully');
    }

    public function show_appointment(){
        if(Auth::id()){

            if(Auth::user()->usertype==1)
            {
                $appointment=appointment::all();
                return view('admin.show_appointment',compact('appointment'));
            }
            else
            {
                return redirect()->back();
            }

        }
        else
        {
            return redirect()->route('login');
        }


    }
    public function approve($id){
        $data=appointment::find($id);
        $data->status='approve';
        $data->save();
        return redirect()->back();

    }

    public function canceled($id){
        $data=appointment::find($id);
        $data->status='Canceled';
        $data->save();
        return redirect()->back();
    }

    public function show_doctor(){
        $data=Doctor::all();
        return view('admin.show_doctor',compact('data'));
    }
    public function delete_doctor($id)
    {
        $data=Doctor::find($id);
        // dd($data);
        $data->delete();
        return redirect()->back();
    }
    public function update_doctor($id)
    {
        $data=Doctor::find($id);
        // dd($data->image);
        return view('admin.update_doctor',compact('data'));
    }

    public function edit_doctor(Request $request , $id )
    {
        $data=Doctor::find($id);
        $data->name=$request->input('name');
        $data->phone=$request->input('phone');
        $data->speciality=$request->input('speciality');
        $data->room=$request->input('room');

        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientoriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return redirect()->route('show_doctor')->with('message','doctor ditails update sucessfully');
    }
    public function email_view($id)
    {
        $data=appointment::find($id);
        return view('admin.email_view',compact('data'));

    }
    public function send_email(Request $request, $id)
    {
        $data= appointment::find($id);

        $details=[
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_part' => $request->end_part,
        ];
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message','Email send is successful');
    }

}
