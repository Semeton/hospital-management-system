<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
// use Notification;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $request->validate([
              'name' => 'required',
              'phone' => 'required',
              'room' => 'required',
              'speciality' => 'required',
              'file' => 'required'
          ]);

        $doctor = new Doctor;

        $image=$request->file;
        $imagename = time().'.'.$image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()
        ->with('message', 'Doctor added successfully');
    }

    public function showappointment()
    {
        
        $appointments = Appointment::all();
        return view('admin.showappointment', compact('appointments'));
    }

    public function approved($id)
    {
        $data = Appointment::find($id);

        $data->status = 'Approved';
        $data->save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = Appointment::find($id);

        $data->status = 'Canceled';
        $data->save();

        return redirect()->back();
    }

    public function showdoctor()
    {
        
        $doctors = Doctor::all();
        return view('admin.showdoctor', compact('doctors'));
    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data = Doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file;

        if($image)
        {
            $imagename = time().'.'.$image->getClientoriginalExtension();
            $request->file->move('doctorimage', $imagename);
    
            $doctor->image = $imagename;
        }
        
        $doctor->save();

        return redirect()->back()
        ->with('message', 'Doctor updated successfully');

    }

    public function emailview($id)
    {
        $data = Appointment::find($id);
        return view('admin.email_view', compact('data'));
    }

    public function sendemail(Request $request,$id)
    {
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'closing' => $request->closing,
        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()
        ->with('message', 'Email sent successfully');
    }
}