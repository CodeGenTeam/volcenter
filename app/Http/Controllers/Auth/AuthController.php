<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        $rules = [
            'login' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'birthday' => 'required|before:now|after:-14 years',
            'firstname' => 'required|Alpha',
            'lastname' => 'required|Alpha',
            'middlename' => 'required|Alpha',
            'birthday'=> 'required|date|date_format:d-m-Y',
        ];

        $messages = [
            'before' => 'Вам должно быть минимум 14 лет!',
            'confirmed' => 'Пароли не совпадают!',
        ];

        $validator = Validator::make($data, $rules, $messages);

        return $validator;
    }

    protected function create(array $data)
    {
        return User::create([
            'login'      => $data['login'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'firstname'  => $data['firstname'],
            'lastname'   => $data['lastname'],
            'middlename' => $data['middlename'],
            'birthday'   => $data['birthday'],
            'role_id'    => 1
        ]);
        
    }
}
