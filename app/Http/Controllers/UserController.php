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
        ];

        $messages = [
            'before' => 'Вам должно быть минимум 14 лет!',
            'confirmed' => 'Пароли не совпадают!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // redirect our user back with error messages       
            $messages = $validator->messages();

            // also redirect them back with old inputs so they dont have to fill out the form again
            // but we wont redirect them with the password they entered

            return redirect()->back()->withErrors($validator);
        }

        if (Auth::check()) {
            return Response::json(['success' => false, 'error' => 'logined']);
        }

        if ($this->register($request)) {
            return redirect('/');
        } else {
            return redirect('/user/register');
        }
    }

    private function register(Request $request)
    {
        $data = $request->all();

        foreach (['firstname', 'lastname', 'middlename'] as $field) {
            if (!isset($data[$field])) {
                $data[$field] = '';
            }
        }

        $user = User::create([
            'login'      => $data['login'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'firstname'  => $data['firstname'],
            'lastname'   => $data['lastname'],
            'middlename' => $data['middlename'],
            'birthday'   => $data['birthday'],
        ]);

        return ['success' => true];
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
        /*
        $u = $request->user();

        if (is_null($u)) {
            return Response::json(['success' => false, 'error' => 'user not found']);
        } else {
            $u->logout();
        }*/
        
        Auth::logout();
        Session::flush();
        return Response::json(['success' => true, 'error' => '']);

        if (is_null($u)) {
            return ['success' => false, 'error' => 'not logined'];
        }
        Auth::logout();
        return ['success' => true];
    }

    public function login(Request $request)
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
        $isLogined = Auth::attempt([
            'email' => $request->get('email'), 'password' => $request->get('password')
        ]);
        if (!$isLogined) {
            return Response::json(['success' => false, 'error' => 'badlogin']);
        }

        return Response::json(['success' => true, 'id' => Auth::User()->id]);
    }
}
