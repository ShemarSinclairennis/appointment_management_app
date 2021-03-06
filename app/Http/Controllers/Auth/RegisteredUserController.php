<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_type' =>'patient',
            'password' => Hash::make($request->password),
            'ip_address' =>request()->ip(),
           
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storeDoctor(Request $request)
    {
        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_type' =>'doctor',
            'ip_address' =>request()->ip(),
            'password' => Hash::make($request->password),
           
        ]);
        event(new Registered($user));
        $doctor = new Doctor;
        $doctor->doctor_id = $user->id;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->middle_initial = $request->middle_initial;
        $doctor->practice = $request->practice;
        $doctor->ip_address = request()->ip();
     
        $doctor->save();

       

        

        return back()->withSuccess("Doctor has been added to the system");
    }
    
    public function deleteUser (){
        $id = Auth::id();
        Auth::logout();
        User::where(['id'=>$id])->delete();
        Patient::where(['patient_id' => $id])->delete();
        Appointment::where(['patient_id' => $id])->delete();
        return redirect()->route('welcome')->withSuccess("User has been successfully deleted");

    }
    public function deleteDoctor (Request $request){
       
        $id = array_column($request->doctor,'doctor_id');
        User::where(['id'=>$id])->delete();
        Doctor::where(['doctor_id' => $id])->delete();
        return back()->withSuccess("Doctor removed")->withSuccess("Doctor has been successfully deleted");

    }
}
