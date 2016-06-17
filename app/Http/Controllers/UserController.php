<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Session;

class UserController extends Controller
{
    private $upgradeableUserFields = ['email', 'firstname', 'lastname', 'middlename', 'birthday', 'password'];

    public function create(Request $request)
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
            'birthday'=> 'required|date|date_format:d-m-Y'
        ];

        $messages = [
            'before' => 'Вам должно быть минимум 14 лет!',
            'confirmed' => 'Пароли не совпадают!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator)->withInput();
        }

        if (Auth::check()) {
            return Response::json(['success' => false, 'error' => 'logined']);
        }

        return $this->register($request);
    }

    private function register(Request $request)
    {
        $data = $request->all();

       // Auth::guard($this->getGuard())->login($this->create($request->all()));

        //return redirect($this->redirectPath());

        return User::create([
            'login'      => $data['login'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'firstname'  => $data['firstname'],
            'lastname'   => $data['lastname'],
            'middlename' => $data['middlename'],
            'birthday'   => $data['birthday'],
        ]);


    }

    public function show(User $user)
    {
        return view('auth.register');

        // $user->load('place_work');

        // if (is_null($user)) {
        //     return Response::json(['success' => false, 'error' => 'User not found.']);
        // } else {
        //     return Response::json(['success' => true, 'user' => $user]);
        // }
    }

    public function update(Request $request, User $user)
    {
        if (is_null($user)) {
            return Response::json(['success' => false, 'error' => 'User not found.']);
        }

        // todo запилить разрешения
        $updated = [];
        foreach ($request->all() as $key => $value) {
            if (in_array($key, $this->upgradeableUserFields)) {
                try {
                    $user->{$key} = $value;
                    $user->save();
                } finally {
                    $updated[] = $key;
                }
            }
        }

        if ($request->place_of_work) {
            $place_of_work = json_decode($request->place_of_work);

            if (count($user->place_of_work) > 0) {
                $user->place_of_work()->update(['address' => $place_of_work->address]);
            } else {
                $user->place_of_work()->create(['address' => $place_of_work->address]);
            }
        }

        return Response::json(['success' => count($updated) != 0]);
    }

    public function destroy(User $user)
    {
        if (is_null($user)) {
            return Response::json(['success' => false, 'error' => 'user not found']);
        }
        /*if ($u != $request->user()) {
            return ['success' => false, 'you haven\'t permission']; // todo запилить разрешения
        } // если редачим не свой акк -- кидаем (пока)*/
        $user->delete();
        return Response::json(['success' => true, 'user' => $user]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return \Redirect::to('login');
    }
    public function login(Request $request)
    {
        return view('auth.login');
    }
    public function loginin(Request $request)
    {
        if (Auth::check()) {
            return Response::json(['success' => false, 'error' => 'logined']);
        }
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255', 'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return Response::json(['success' => false, 'error' => $validator->errors()->all()]);
        }
        $data = $request->all();
        $isLogined = Auth::attempt([
            'email' => $data['email'], 'password' => $data['password']
        ]);
        if (!$isLogined) {
            return \Redirect::to('login');
        }else{
            return \Redirect::to('');
        }
    }
}
