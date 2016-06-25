<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Study;
use App\Models\Study_university;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class StudyController extends Controller
{
    public function destroy(Request $request)
    {
        $study_id = $request->get('id');
        if(Study::destroy($study_id))
        {
            return ['message'=>'success'];
        }
        return ['message'=>'failed'];
    }
    
    public function store(Request $request, User $user)
    {
        $education_id = $request->get('id');
        $education_place_name = $request->get('place_name');
        $study_start = $request->get('study_start');
        $study_stop = $request->get('study_stop');
        $group = $request->get('group');
        $faculty = $request->get('faculty');
        $chair = $request->get('chair');
        $id = Auth::user()->id;
        if(Study::where('id',$education_id) && $education_id!=null)
        {
            $study = Study::find($education_id);
            $study->update(['user_id'=>$id,'place_name' => $education_place_name,'time_start'=>$study_start,'time_stop'=>$study_stop,'group'=>$group]);
            $univer = Study_university::where(['study_id'=>$education_id]);
            $univer->update(['faculty'=>$faculty,'chair'=>$chair]);
        }else {
            $study = Study::create(['user_id'=>$id,'place_name' => $education_place_name,'time_start'=>$study_start,'time_stop'=>$study_stop,'group'=>$group])->id;
            if($faculty==null) $faculty="";
            if($chair==null) $chair="";
            if($faculty!="" || $chair!="")
            Study_university::create(['faculty'=>$faculty,'chair'=>$chair,'study_id'=>$study]);
        }
        return ['message'=>'success','id'=>$study];
    }
}
