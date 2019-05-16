<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use App\TypeOfJob;
use App\Apply;
use DB;
use Session;
use App\Location;

class jobPostController extends Controller
{
   public function getAllJob($username){
   	$job=Job::where('idUser',$username)->get();

   	return view('company/jobPost/allJob',['job'=>$job]);
   }

   public function getPostJob($username){

   	$cate = Category::all();
   	$type = TypeOfJob::all();
   	$location = Location::all();
   	return view('company/jobPost/postJob',['cate'=>$cate,'type'=>$type,'location'=>$location]);
	}

	public function postPostJob(Request $req){
		$today = date("Y-m-d", time());

		if(strtotime($today)>strtotime($req->deadline)){
			return redirect('company/jobPost/postJob/'.session('user'))->with('error','Ngày tháng nhập vào phải sau hiện tại');
		}else{
		$job= new Job();
		$job->title = $req->title;
		$job->salary= $req->salary;
		$job->description = nl2br($req->des);
		$job->requirement = nl2br($req->req);

		$job->deadline = $req->deadline;
		$job->location = $req->location;
//chỉnh sửa phần idUser
		if(Session::has('user')){
		$job->idUser = Session('user');
	}
		$job->date = date("Y-m-d", time());
		$type = TypeOfJob::where('Name',$req->type)->first();
		$job->idType = $type->Id;
//		$job->idType = TypeOfJob::select('Id')->where('Name',$req->type)->first();

		$cate = Category::where('Name',$req->category)->first();
		$job->idCategory = $cate->Id;
		$job->state= 0;
//		$job->idCategory = Category::select('Id')->where('Name',$req->category)->first();
		$job->views = "0";
		 
		$job->save();
		return redirect('company/jobPost/allJob/'.session('user'))->with('thanhcong','Đã thêm công việc');

	}
}
	public function getDetailJob($id){
		$job=Job::where('Id',$id)->first();
		$type = TypeOfJob::join('Job','TypeOfJob.Id','=','Job.idType')->where('Job.Id',$id)->first();
		$cate = Category::join('Job','Category.Id','=','Job.idCategory')->where('Job.Id',$id)->first();
//		$apply = Apply::where('idJob',$id)->count();

		return view('company/jobPost/detailJob',['job'=>$job,'cate'=>$cate,'type'=>$type]);
	}
	public function getUpdateJob($id){


	$job=Job::where('Id',$id)->first();
	$cate = Category::all();
   	$type = TypeOfJob::all();
   	$location = Location::all();

		return view('company/jobPost/updateJob',['job'=>$job,'cate'=>$cate,'type'=>$type,'location'=>$location]);

	}
	public function postUpdateJob(Request $req,$id){
		$today = date("Y-m-d", time());

		if(strtotime($today)>strtotime($req->deadline)){
			return redirect('company/jobPost/updateJob/'.$id)->with('error','Ngày tháng nhập vào phải sau hiện tại');
		}else{
	
		$job = Job::where('Id',$id)->first();
		$cate = Category::where('Name',$req->category)->first();
		$type = TypeOfJob::where('Name',$req->type)->first();
		if(!($req->title)) 
			$title = $job->title;
			else $title = $req->title;
		if(!($req->salary)) 
			$salary = $job->salary;
			else $salary = $req->salary;
		if(!($req->des))
			$des = $job->description;
			else $des = nl2br($req->des);

		if(!($req->req))
			$reqi = $job->requirement;
			else $reqi = nl2br($req->req);

		

		DB::table('Job')->where('Id',$id)->update(['Job.title'=>$title,'Job.salary'=>$salary,'Job.description'=>$des,'Job.requirement'=>$reqi,'Job.deadline'=>$req->deadline,'Job.idType'=>$type->Id,'Job.idCategory'=>$cate->Id,'Job.location'=>$req->location]);
  		return redirect('company/jobPost/allJob/'.session('user'))->with('chinhsua',"Đã chỉnh sửa thành công công việc");
	}
}
	public function getDeleteJob($id){
		$job = Job::where('Id',$id);

		$apply = Apply::where('idJob',$id);
		$apply->delete();
		$job->delete();

		return redirect('company/jobPost/allJob/'.session('user'))->with('xoa','Đã xóa công việc thành công');
		
	}
	public function deactive ($id){
		DB::table('job')->where('Id',$id)->update(['state'=>1]);
		return redirect('company/jobPost/allJob/'.session('user'));
	}
	public function getActive($id){
		$job=Job::where('Id',$id)->first();
		return view('company/jobPost/active',['job'=>$job]);
	}
	public function postActive(Request $req, $id){
		$today = date("Y-m-d", time());

		if(strtotime($today)>strtotime($req->deadline)){
			return redirect('company/jobPost/active/'.$id)->with('error','Ngày tháng nhập vào phải sau hiện tại');
			}else{
		DB::table('job')->where('Id',$id)->update(['deadline'=>$req->deadline,'state'=>0]);
		return redirect('company/jobPost/updateJob/'.$id);
	}
}
}

