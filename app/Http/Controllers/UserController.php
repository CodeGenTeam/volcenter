<?php

namespace app\Http\Controllers;

use App\Http\Requests;
use App\Models\Users;
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
        if (Auth::check()) {
            return Response::json(['success' => false, 'error' => 'logined']);
        }

        switch ($request->get('action')) {
            case 'check':
                return $this->checkUser($request);
                break;
            case 'register':
                $check = $this->checkUser($request);
                if (!$check['success']) {
                    return $check;
                }
                return $this->register($request);
                break;
            default:
                return Response::json(['success' => false, 'error' => 'empty action']);
                break;
        }
    }

    private function checkUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|max:255', 'email' => 'required|email|max:255|unique:Users',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return ['success' => false, 'error' => $validator->errors()->all()];
        } else {
            return ['success' => true];
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

        $user = Users::create([
            'login'      => $data['login'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'firstname'  => $data['firstname'],
            'lastname'   => $data['lastname'],
            'middlename' => $data['middlename'],
        ]);

        if (is_null($user)) {
            return ['success' => false, 'error' => 'null user'];
        } else {
            return ['success' => true, 'note' => 'registred', 'id' => $user->id];
        } // (про 'note') ну на всяк случай
    }

    public function show(Users $user)
    {
        $user->load('place_of_work');

        if (is_null($user)) {
            return Response::json(['success' => false, 'error' => 'User not found.']);
        } else {
            return Response::json(['success' => true, 'user' => $user]);
        }
    }

    public function update(Request $request, Users $user)
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

    public function destroy(Users $user)
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
