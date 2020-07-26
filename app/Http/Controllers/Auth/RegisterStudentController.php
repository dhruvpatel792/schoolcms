<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\StudentsClass;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterStudentController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

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
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'contact' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'enrollment' => ['nullable'],
            'studentsclass' => ['required'],
            'div' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $lastenrollment = DB::table('users')->latest('enrollment')->first();
        $enrollment_new = '';

        if($lastenrollment->enrollment){
            $enrollment_new = (int)$lastenrollment->enrollment + 1;
        }else{
            $enrollment_new =Carbon::now()->format('yy')*100+1;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'address' => $data['address'],
            'role'  => $data['role'],
            'enrollment' => $enrollment_new,
            'studentsclass' => $data['studentsclass'],
            'div' => $data['div'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
