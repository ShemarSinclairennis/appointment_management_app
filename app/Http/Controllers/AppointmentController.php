<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMail;
use App\Mail\DeclineMail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render("Doctor/Appointments", [
            'appointments' => Appointment::where('status','!=','')->when($request->term, function($query,$term){
                $query->where('appointment_date','LIKE','%'.$term.'%');
            })->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $request->validate([
        'reason' => 'required|string|max:30',
        'appointment_date' => 'required',
        'appointment_time'=>'required',
        
    ]);
        $appointment = new Appointment;
        $appointment->reason = $request->reason;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->patient_id = Auth::id();
        $appointment->status ='Waiting';
        $appointment->ip_address = request()->ip();
        $appointment->save();
        return back()->withSuccess("Appointment created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Patient $patient)
    {
        
        $id = Auth::id();
        $patient=  Patient::where('patient_id',$id)->count();

        if($patient==0){
            $patient=='incomplete';
        }else{
            $patient=='complete';
        }
        return Inertia::render("Patient/Appointments", [ 'patient_profile_status'=>$patient,
            'appointments' => Appointment::where('patient_id',$id)->orderBy('created_at', 'desc')->when($request->term, function($query,$term){
                $query->where('appointment_date','LIKE','%'.$term.'%');
            })->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
       Appointment::where('id',$appointment->id)->first()->delete();
       return back()->withSuccess("Appointment has been removed");
       
    }

    public function confirmAppointment(Request $request){
                $id=array_column($request->appointment,'id');
                $appointment=Appointment::where('id',$id)->first();
                $appointment->status="Confirmed";
                $appointment->save();
                $email= Auth::user()->email;
                $data =['id'=>$id];
                Mail::to($email)->send(new AppointmentMail,$data);
                return back()->withSuccess("Appointment has been confirmed");
        
            }

    public function declineAppointment(Request $request){
        $id=array_column($request->appointment,'id');
                $appointment=Appointment::where('id',$id)->first();
                $appointment->status="Declined";
                $appointment->save();
                $email= Auth::user()->email;
                $data =['id'=>$id];
                Mail::to($email)->send(new DeclineMail,$data);
                return back()->withSuccess("Appointment has been declined");

    }
}
