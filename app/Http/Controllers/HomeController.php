<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==0)
            {
                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            }

            else{
                return view('admin.home');
            }
        }

        else{
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        
        else
        {
            
            $doctors = Doctor::all();
            return view('user.home', compact('doctors'));

        }
    }

    public function appointment(Request $request)
    {
        $request->validate([
              'name' => 'required',
              'number' => 'required',
              'email' => 'required',
              'doctor' => 'required',
              'date' => 'required',
              'message' => 'required'
          ]);
          
        $data = new Appointment();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->doctor = $request->doctor;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->status = 'In progress';

        if(Auth::id())
        {
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()
        ->with('message', 'Appointment Request Successful. We will contact with you soon');
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appointments = Appointment::where('user_id', $userid)->get();
            return view('user.my_appointment', compact('appointments'));
        }
        
        else
        {

            return redirect()->back();

        }
        
    }

    public function cancel_appointment($id)
    {
        $data = Appointment::find($id);
        $data->delete();

        return redirect()->back()
        ->with('message', 'You have successfully canceled your appointment');
    }
}