<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Address;
use App\Models\Profile_type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use File;


class UserController extends Controller
{
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
            $user->update($request->all());
            $address_id = $request->get('address_id');
            if(Address::where('id',$address_id) && $address_id!=null)
            {
                $address = Address::find($address_id);
                $address->update($request->all());
            }else $address = new Address($request->all());
        return $address;
            $user->addresses()->saveMany([$address]);
            return Response::json(['sucess'=>true]);
    }

    public function destroy(User $user)
    {
        if (is_null($user)) {
            return abort(401);
        }
        $user->delete();
        return Response::json(['success' => true]);
    }

    public function edit()
    {
        $user = Auth::user();
        if (is_null($user)) {
            return abort(401);
        }
        $user->load('profiles.getProfileType')->load('phones')->load('addresses');
        $profile_types = Profile_type::all();
        return view('user_panel.user.settings', ['user' => $user,'profile_types'=>$profile_types]);
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
