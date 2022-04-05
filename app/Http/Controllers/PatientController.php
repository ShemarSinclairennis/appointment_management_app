<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            
        return Inertia::render("Patients", [
            "patients"=> Patient::all(),
                
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("Forms/Patientform", [
          
            "mode" => "Add",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $patient = new Patient;
        $patient->patient_id = Auth::id();
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->middle_initial = $request->middle_initial;
        $patient->gender = $request->gender;
        $patient->dob = $request->dob; 
        $patient->street_address = $request->street_address;
        $patient->city = $request->city;
        $patient->parish = $request->parish;
        $patient->home_phone = $request->home_phone;
        $patient->cell_phone = $request->cell_phone;
        $patient->email = $request->email;
        $patient->occupation = $request->occupation;
        $patient->employer = $request->employer;
        $patient->employer_number = $request->employer_number;
        $patient->emergency_name = $request->emergency_name;
        $patient->emergency_home_phone = $request->emergency_home_phone;
        $patient->emergency_cell_phone = $request->emergency_cell_phone;
        $patient->save();
        return back()->withSuccess("Patient added to the system");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $id = Auth::id();
        $empty_object=[];
        $patient = Patient::find(['patient_id' => $id])->first(); 
        if(empty($patient)) 
        {return Inertia::render("Patient/Information",["patient"=>$empty_object]);}
        else
        {return Inertia::render("Patient/Information",[
            "patient"=> $patient
            
        ]); };
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        
        $patient->patient_id = Auth::id();
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->middle_initial = $request->middle_initial;
        $patient->gender = $request->gender;
        $patient->dob = $request->dob; 
        $patient->street_address = $request->street_address;
        $patient->city = $request->city;
        $patient->parish = $request->parish;
        $patient->home_phone = $request->home_phone;
        $patient->cell_phone = $request->cell_phone;
        $patient->email = $request->email;
        $patient->occupation = $request->occupation;
        $patient->employer = $request->employer;
        $patient->employer_number = $request->employer_number;
        $patient->emergency_name = $request->emergency_name;
        $patient->emergency_home_phone = $request->emergency_home_phone;
        $patient->emergency_cell_phone = $request->emergency_cell_phone;
        $patient->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
