<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
            return abort(401);
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

        return back();
    }

    public function destroy(User $user)
    {
        if (is_null($user)) {
            return abort(401);
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
        if (is_null($user)) {
            return abort(401);
        }
        return view('user_panel.user.settings', ['user' => $user]);
    }

    public function top()
    {
        $users = User::all();

        return view('top', ['users' => $users]);
    }
}
