<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Foundation\Auth\ResetsPasswords;

class UserController extends Controller
{
    private $upgradeableUserFields = ['email', 'firstname', 'lastname', 'middlename', 'birthday', 'password'];

    public function __construct()
    {
        // не пропустит, пока не авторизуемся
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
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

        if ($request->place_work) {
            if (count($user->place_work) > 0) {
                $user->place_work()->update(['address' => $request->place_work]);
            } else {
                $user->place_work()->create(['address' => $request->place_work]);
            }
        }

        return back();
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

    public function edit()
    {
        $user = Auth::user();
        $user->load('place_work');

        return view('user_panel.user.settings', ['user' => $user]);
    }
}
