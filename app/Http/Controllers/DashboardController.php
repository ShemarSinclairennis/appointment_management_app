<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $empty_array= [ 
        "id" => 0,
        "patient_id" => 0,
        "reason" => "No Upcoming Appointment",
        "appointment_date" => "0000-00-00",
        "appointment_time" => "--:--:--",
        "status" => "Null",
        ];

        $id = Auth::id();
        $patient=  Patient::where('patient_id',$id)->count();
        $appointments_count=  Appointment::where('patient_id',$id)->count();
        $appointments= Appointment::where('patient_id',$id)->orderBy('appointment_date','desc')->limit(5)->get();
        $upcoming_appointment = Appointment::where('patient_id',$id)->orderBy('appointment_date','desc')->first();

        if($patient==0){
            $patient=='incomplete';
        }else{
            $patient=='complete';
        }
      
        if(empty($upcoming_appointment)){
            $upcoming_appointment=$empty_array;
            
        }
         
        return Inertia::render("Patient/Dashboard", [
            'appointments' => $appointments,
            'appointments_count'=>$appointments_count,
            'upcoming_appointment'=> $upcoming_appointment,
            'patient_profile_status'=>$patient

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
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
