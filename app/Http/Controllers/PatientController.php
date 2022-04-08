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
       
            
        return Inertia::render("Doctor/Patients", ["patients" => Patient::where('id','!=','')->paginate(10)]);
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
    { $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'middle_initial'=>'required|string|max:1',
        'gender'=>'required',
        'dob'=>'required',
        'street_address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'parish'=>'required',
        'home_phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'cell_phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'email' => 'required|string|email|max:255|unique:users',
        'occupation' => 'required|string|max:50',
        'employer' => 'required|string|max:50',
        'employer_number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        
        'emergency_name' => 'required|string|max:255',
        'emergency_home_phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'emergency_cell_phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        
    ]);
        
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
        $patient->ip_address = request()->ip();
        $patient->save();
        return redirect()->route('patient.patientInformation')->withSuccess("Your information has been added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        
    }
    public function patientInformation(){
        $id = Auth::id();
        $patient = Patient::where(['patient_id' => $id])->first(); 
        // dd($patient);
        if(!$patient) {
        return redirect()->route('patient.create');}
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
        
        return Inertia::render("Forms/Patientform", [
          "patient"=> $patient,
            "mode" => "Edit",
        ]);
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
        return redirect()->route('patient.patientInformation')->withSuccess("Your information has been updated");
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
