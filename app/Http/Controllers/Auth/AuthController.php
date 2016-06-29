<?php

namespace App\Http\Controllers\Auth;

use Request;
use Illuminate\Http\Request as Req;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Hash;
use Illuminate\Http\Exception\HttpResponseException;

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
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'birthday' => 'required|date|before:now',
            'firstname' => 'required|Alpha',
            'lastname' => 'required|Alpha',
            'middlename' => 'required|Alpha'
        ];

        $messages = [
            'before' => 'Ошибка с датой!',
            'confirmed' => 'Пароли не совпадают!',
        ];

        $validator = Validator::make($data, $rules, $messages);

        return $validator;
    }

    protected function create(array $data)
    {
        return User::create([
            'username'      => $data['username'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'firstname'  => $data['firstname'],
            'lastname'   => $data['lastname'],
            'middlename' => $data['middlename'],
            'birthday'   => $data['birthday'],
            'role_id'    => 1
        ]);
    }
    // override withInput without password
    protected function buildFailedValidationResponse(Req $request, array $errors)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return new JsonResponse($errors, 422);
        }

        return redirect()->to($this->getRedirectUrl())
            ->withInput($request->except('password','password_confirmation'))
            ->withErrors($errors, $this->errorBag());
    }
}
