<?php

namespace ConvAux\Http\Controllers\Auth;

use ConvAux\User;
use ConvAux\Role;
use Validator;
use ConvAux\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/console';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:50',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users',
            'ci'=> 'required|min:7|max:10|unique:users',
            'expedido' => 'required',
            'cod_sis' => 'required|numeric|min:19000000|max:205000000|unique:users',
            'carrera' => 'required|max:60',
            'password' => 'required|min:6|confirmed',
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
        $role_user_estudiante = Role::where('name','user_estudiante')->first();
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'ci' => $data['ci'],
            'expedido' => $data['expedido'],
            'cod_sis' => $data['cod_sis'],
            'carrera' => $data['carrera'],
            'password' => bcrypt($data['password']),
        ]);
        $user->roles()->attach($role_user_estudiante);
        return $user;
    }
}
