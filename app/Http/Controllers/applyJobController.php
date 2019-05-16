<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Apply;
use App\Job;
use App\Skill;
use DB;
use App\mail;

class applyJobController extends Controller
{
    public function getComIndex($username){
            $today = date("Y-m-d", time());
    $job = DB::table('job')->get();
    foreach ($job as $key) {
       if(strtotime($today)>strtotime($key->deadline)){ 
       DB::table('job')->where('Id',$key->Id)->update(['state'=> 1]);
          }}

        $user = DB::table('user')->where('username',$username)->get();
       
        return view('company/comIndex',['user'=>$user]);
    }


    public function getAllApplyJob($username){
  //  	$job = Job::find($username);
   // 	$id = $job->Id;
    	$apply = Apply::join('Job','Apply.IdJob','=','Job.Id')->where('Job.idUser',$username)->get();
    	return view('company/applyJob/allApplyJob',['apply'=>$apply]);

    }
    public function getUngVien($username){
    	$user = User::where('username',$username)->get();
    	$skill = Skill::join('User','Skill.username','=','User.username')->where('User.username',$username)->get();
    	return view('company/applyJob/ungVien',['user'=>$user,'skill'=>$skill]);
    }
    public function getsearchUngVien(){
        $user = DB::table('user')->where('type','2')->get();

        return view('company/applyJob/searchUngVien',['user'=>$user]);
    }
    public function postUpdateState(Request $req , $idJob, $username){
        $sta = $req->state;
        DB::table('apply')->where('idJob','=',$idJob)->where('username','=',$username)->update(['stateapply'=>$sta]);
        return redirect('company/applyJob/allApplyJob/'.session('user'))->with('update','Đã update thành công');
    }
}
