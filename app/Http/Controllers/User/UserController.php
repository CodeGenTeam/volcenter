<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use File;
class UserController extends Controller
{
    private $upgradeableUserFields = ['email', 'firstname', 'lastname', 'middlename', 'birthday', 'password'];
    private $page = '/user_panel_bin/images/users';
    public function __construct()
    {
        // не пропустит, пока не авторизуемся
        //$this->middleware('auth');
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

    public function removeimage(Request $request)
    {
        $img_path = base_path('public').$this->page;
        $old_img = $request->query('old_img');
        File::delete($img_path.'/'.$old_img);
        $user = Auth::user();
        $user->update(['image'=>'']);
        return Response::json(['success' => true]);
    }
    public function saveimage(Request $request)
    {
        $img_path = base_path('public').$this->page;
        $file = $request->file('file_data');
        $file_name = md5(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
        $file->move($img_path, $file_name);
        $user = Auth::user();

        $old_img = $user->image;
        File::delete($img_path.'/'.$old_img);

        $user->update(['image'=>$file_name]);
        return Response::json([
            'success'   => true,
            'filename'  => $file_name,
        ]);
    }
    public function show(User $user)
    {
        //$users = User::with(array('profiles'))->get();
        //dd($users);
        //$users = User::with(array('profiles' => function ($query) {
       //     $query->where('users.id', '=', 1);
       // }))->get();
        $user->load('profiles.getProfileType','study.getStudyUniversity','language.getLanguage');
        return view('user_panel/user/profile', ['user'=>$user]);
    }
}
