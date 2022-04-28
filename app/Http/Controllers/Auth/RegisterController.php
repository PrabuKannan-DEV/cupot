<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['sometimes'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['sometimes'],
            'last_name' => ['sometimes'],
            'email' => ['sometimes'],
            'password' => ['sometimes'],
            'dob' => ['sometimes'],
            'gender' => ['sometimes'],
            'annual_income' => ['sometimes'],
            'occupation' => ['sometimes'],
            'family_type' => ['sometimes'],
            'manglik' => ['sometimes'],
            'google_id' => ['sometimes']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['first_name'].' '.$data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_name'=> $data['first_name'],
            'last_name'=> $data['last_name'],
            'dob'=> $data['dob'],
            'gender'=> $data['gender'],
            'annual_income'=> $data['annual_income'],
            'occupation'=> $data['occupation'],
            'family_type'=> $data['family_type'],
            'manglik'=> $data['manglik'],
            'google_id'=> $data['google_id']??Null,
        ]);
        $this->redirectTo = route('users.partner_preferences.create',['user'=>$user, 'mode'=>'create']);
        return $user;
    }
}
