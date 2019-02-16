<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Doctor;
use App\Patient;
use App\Specialty;

class RegisterController extends Controller
{
   /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'gender' => ['required', 'string', 'max:1'],
            'dob' => ['required', 'date'],
            'mobile_no'=>['required', 'string', 'max:10'],
        ]);
    }
    
    protected function doctorRegister()
    {
         $specialties = Specialty::all();
        return view('auth.register-doctor')
                ->with('specialties',$specialties);
    }
    protected function postDoctorRegister()
    {
        $request = request();
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        $doctor = Doctor::create($request->all());
        $user = User::create([
            'name' => $request['name'],
            'type' => 'doctor',
            'type_id' => $doctor->id,
            'email' => $request['email'],
            'active'=>$request['active'],
            'password' => Hash::make($request['password']),
        ]);
        if($user){
            return redirect('/login');
        }
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      
        $patient = Patient::create($data);
        
        return User::create([
            'name' => $data['name'],
            'type' => 'patient',
            'type_id' => $patient->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
