<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\RequestProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'name' => 'required|string|max:150',
            'lastname' => 'required|string|max:150',
            'docid' => 'required|string|max:20|unique:users',
            'username' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:8|max:80|confirmed',
            'email' => 'required|string|email|max:180|unique:users',
            'profile' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = new User;
        $pin = $user->generarPin();
        RequestProfile::create([
            'username'=> $data['username'],
            'profile' => $data['profile'],
        ]);
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'docid' => $data['docid'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'pin' => $pin,
            'email' => $data['email'],
        ]);
    }
}
