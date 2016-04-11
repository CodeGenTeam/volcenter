<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    private $upgradeableUserFields = ['email', 'name1', 'name2', 'name3', 'birthday', 'password'];

    public function create(Request $request) {
        if (Auth::check()) return Response::json(['success' => false, 'error' => 'logined']);
        switch ($request->get('action')) {
            case 'check':
                return $this->checkUser($request);
                break;
            case 'register':
                $check = $this->checkUser($request);
                if (!$check['success']) return $check;
                return $this->register($request);
                break;
            default:
                return Response::json(['success' => false, 'error' => 'empty action']);
                break;
        }
    }

    private function checkUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'login' => 'required|max:255', 'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return ['success' => false, 'error' => $validator->errors()->all()];
        } else {
            return ['success' => true];
        }
    }

    private function register(Request $request) {
        $data = $request->all();
<<<<<<< HEAD
        $user = User::create([
            'login' => $data['login'], 'email' => $data['email'], 'password' => bcrypt($data['password']),
			'name1' => $data['name1']
=======
        User::create([
            'login' => $data['login'], 'email' => $data['email'], 'password' => bcrypt($data['password'])
>>>>>>> f581ecee149e1fbb64b0ca66ffbca56e4646575f
        ]);
        //if (!is_null($u)) {
        //    return ['success' => false, 'error' => 'null user'];
        //} else {
<<<<<<< HEAD
        return ['success' => true, 'note' => 'registred', 'id' => $user->id]; // (про 'note') ну на всяк случай
=======
        return ['success' => true, 'note' => 'registred']; // (про 'note') ну на всяк случай
>>>>>>> f581ecee149e1fbb64b0ca66ffbca56e4646575f
        //}
    }

    public function show($id) {
        $u = User::find($id);
        if (is_null($u)) {
            return ['success' => false, 'error' => 'user not found'];
        } else {
            return ['success' => true, 'user' => $u];
        }
    }

    public function update(Request $request, $id) {
        $u = User::find($id);
        if (is_null($u)) {
            return ['success' => false, 'user not found'];
        } else {
            /*if ($u != $request->user()) {
                return ['success' => false, 'you haven\'t permission']; // todo запилить разрешения
            } // если редачим не свой акк -- кидаем (пока)*/
            $updated = [];
            foreach ($request as $key => $value) {
                if (in_array($key, $this->upgradeableUserFields)) {
                    try {
                        $u->{$key} = $value;
                    } finally {
                        $updated[] = $key;
                    }
                }
            }
            return ['success' => count($updated) != 0, 'fields' => $updated];
        }
    }

    public function destroy($id) {
        $u = User::find($id);
        if (is_null($u)) return Response::json(['success' => false, 'error' => 'user not found']);
        /*if ($u != $request->user()) {
            return ['success' => false, 'you haven\'t permission']; // todo запилить разрешения
        } // если редачим не свой акк -- кидаем (пока)*/
        try {
            $u->delete();
        } finally {
            return Response::json(['success' => true]);
        }
        return Response::json(['success' => false, 'error' => 'error']);
    }

    public function logout(Request $request) {
        $u = $request->user();
        if (is_null($u)) {
            return Response::json(['success' => false, 'error' => 'user not found']);
        } else {
            $u->logout();
        }
    }

    public function login(Request $request) {
        if (Auth::check()) return Response::json(['success' => false, 'error' => 'logined']);
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255', 'password' => 'required|min:6'
        ]);
        if ($validator->fails()) return Response::json(['success' => false, 'error' => $validator->errors()->all()]);
        $isLogined = Auth::attempt([
            'email' => $request->get('email'), 'password' => $request->get('password')
        ]);
        if (!$isLogined) return Response::json(['success' => false, 'error' => 'badlogin']);
        return Response::json(['success' => true, 'id' => Auth::user()->id]);
    }
}
