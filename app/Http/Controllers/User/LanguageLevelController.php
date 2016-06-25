<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Language_level;
use Illuminate\Http\Request;
use Auth;
use App\Models\Language;
use App\Models\Level_language;

class LanguageLevelController extends Controller
{
    public function destroy(Request $request)
    {
        $language_id = $request->get('id');
        if(Language_level::destroy($language_id))
        {
            return ['message'=>'success'];
        }
        return ['message'=>'failed'];
    }
    
    public function language_level()
    {
        $languages = Language::all();
        $level_languages = Level_language::all();
        return ['languages'=>$languages,'level_languages'=>$level_languages];
    }

    public function store(Request $request)
    {
        $lang_level_id = $request->get('id');
        $language_id = $request->get('language_id');
        $level_language_id = $request->get('level_language_id');
        $id = Auth::user()->id;
        if(Language_level::where('id',$lang_level_id) && $lang_level_id!=null)
        {
            $study = Language_level::where('id',$lang_level_id)->update(['user_id'=>$id,'language_id'=>$language_id,'level_language_id'=>$level_language_id]);
        }else {
            $study = Language_level::create(['user_id'=>$id,'language_id' => $language_id,'level_language_id'=>$level_language_id])->id;
        }
        return ['message'=>'success','id'=>$study];
    }
}