<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Empresa;
use App\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/empresa';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'empresa' => 'required|string|max:30',
            'password' => 'required|string|min:6|confirmed',
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
        $empresa = Empresa::create([
            'empresa' => $data['empresa'],
        ]);

        $estado = Estado::create([
            'estado' => 'Nuevo',
            'badge' => 'badge-primary',
            'empresaId' => $empresa->id,
        ]);
        $estado = Estado::create([
            'estado' => 'En Taller',
            'badge' => 'badge-warning',
            'empresaId' => $empresa->id,
        ]);
        $estado = Estado::create([
            'estado' => 'Entregado',
            'badge' => 'badge-success',
            'empresaId' => $empresa->id,
        ]);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'empresaId' => $empresa->id,
            'password' => Hash::make($data['password']),
        ]);
    }
}
