<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render("Doctor/Appointments", [
            'appointments' => Appointment::where('status','!=','declined')->paginate(10)
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
    public function show(Patient $patient)
    {
        $id = Auth::id();
        return Inertia::render("Patient/Appointments", [
            'appointments' => Appointment::where('patient_id',$id)->orderBy('created_at', 'desc')->paginate(10)
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
       return back()->withSuccess("Appointment removed");
       
    }
}
