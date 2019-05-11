<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use Session;
use Auth;
use DB;

class pageController extends Controller
{
    public function postData(Request $req){
    	$this->validate($req,
    		[
    			'mail'=>'required|email',
    			'name'=>'required',
    			'username'=>'required|unique:user,username',
    			'password'=>'required|min:6|max:20',
    			'rePass'=>'required|same:password'
    		],
    		[
    			'mail.required'=>'Vui lòng nhập email !',
    			'mail.email'=>'Vui lòng nhập đúng định dạng email',
    			'username.required'=>'Vui lòng nhập username',
    			'username.unique'=>'Username đã tồn tại',
    			'password.required'=>'Vui lòng nhập password',
    			'password.min'=>'Ít nhất 6 kí tự',
    			'password.max'=>'Tối đa 20 kí tự',
    			'rePass.required'=>'Bạn chưa nhập lại password',
    			'rePass.same'=>'Mật khẩu không khớp',
    			'name.required'=>'Vui lòng nhập họ tên'
    		]
    	);
    	$user = new User();
    	$user->username= $req->username;
    	$user->password= $req->password;
    	$user->name= $req->name;
    	$user->gender=$req->rdoGender;
    	$user->DOB=$req->DOB;
    	$user->address=$req->address;
    	$user->type=(int)$req->rdoType;
    	$user->mail=$req->mail;
    	$user->money=0;
    	$user->phone=$req->phoneNumber;
    	$user->website=$req->website;
        $user->company=$req->company;
    	$user->save();

        if((int)$req->rdoType==2){
            $skill = new Skill();
            $skill->username=$req->username;
            $skill->save();
        }
        Session::put('user',$req->username);
        Session::put('type',(int)$req->rdoType);
        echo '<script type="text/javascript"> opener.location.reload();</script>';
        echo '<script type="text/javascript"> window.close()</script>';
    }
    public function login(Request $req){
    	$this->validate(
    		$req,
    		[
    			'username'=>'required',
    			'password'=>'required'
    		],
    		[
    			'username.required'=>'Bạn chưa nhập username',
    			'password.required'=>'Bạn chưa nhập password'
    		]
    	);
    	$username=$req->username;
        $password=$req->password;
        $check = DB::table('user')->where('username','=',$username)->where('password','=',$password)->get();
        if(count($check)!=0){
            Session::put('user',$username);
            Session::put('type',$check[0]->type);
            if(Session('type')==0){
                echo '<script type="text/javascript"> opener.location="https://viblo.asia/p/laravel-cho-nguoi-moi-bat-dauchuong-3-blade-templating-trong-laravel-Qbq5Q1n45D8";</script>';
                echo '<script type="text/javascript"> window.close()</script>';
            }
            else {
                echo '<script type="text/javascript"> opener.location.reload();</script>';
                echo '<script type="text/javascript"> window.close()</script>';
            }
        } else return redirect()->back()->with('thongbao','Thông tin tài khoản không chính xác');
    	
    }
    public function logout(){
        Session::forget('user');
        return redirect()->back();
    }
    public function getInfor(){
        $username = Session('user');
        if(Session('type')==2){
            $result = DB::table('user')->where('user.username',$username)->join('Skill','user.username','=','skill.username')->first();
        } else {
            $result = DB::table('user')->where('username',$username)->first();
        }
        return view('infor',compact('result'));
    }
    public function updateInfor(Request $req){
        $username = Session('user');
        $mail = $req->mail;
        $result = DB::table('user')->where('mail','=',$mail)->where('username','!=',$username)->get();
        $result1 = DB::table('user')->where('username',$username)->first();
        if(count($result)!=0) return redirect()->back()->with('mail_danger','Email already exists!');
        else {
            if($result1->type==1||$result1->type==0){
                DB::table('user')->where('username',$username)->update(['name'=>$req->name,'gender'=>$req->rdoGender,'DOB'=>$req->DOB,'address'=>$req->address,'phone'=>$req->phoneNumber,'website'=>$req->website,'company'=>$req->company]);
            } else {
                DB::table('user')->where('username',$username)->update(['name'=>$req->name,'gender'=>$req->rdoGender,'DOB'=>$req->DOB,'address'=>$req->address,'phone'=>$req->phoneNumber,'website'=>'','company'=>'']);
                DB::table('skill')->where('username',$username)->update(['skill'=>$req->skill,'experience'=>$req->experience]);
            }
            return redirect()->back()->with('update_success','Update successfull!');
        }
    }
    public function updatePass(Request $req){
        $this->validate($req,
            [
                'password'=>'required|min:6|max:20',
                'rePass'=>'required|same:password'
            ],
            [
                'password.required'=>'Please enter password!',
                'password.min'=>'Minimum of password is 6 characters!',
                'password.max'=>'Maximum of password is 20 characters!',
                'rePass.required'=>'Please enter re-password!',
                'rePass.same'=>'The passwords are not same!'
            ]
        );
        $username = Session('user');
            DB::table('user')->where('username',$username)->select('password')->update(['password'=>$req->password]);
        return redirect()->back()->with('update_success1','Update successfull!');
    }   
       public function getIndex(){
        $sumofjobs = Job::all();
        $alljobs = Job::paginate(4);
        $types = TypeOfJob::all();
        $alluser = User::all();
        $category = Category::all();
        $location = Location::all();
        $allapply = Apply::all();
        if(count($types)%4==0) $var=count($types)/4;
        else $var = floor(count($types)/4)+1;
        return view('page.trangchu',compact('var','alljobs','types','category','location','alluser','allapply','sumofjobs'));
    }

    public function getTypeOfJob($type){
        $type_of_job = Job::where('idType',$type)->paginate(4);
        $sumofjobs = Job::all();
        $types = TypeOfJob::all();
        $alluser = User::all();
        $category = Category::all();
        $location = Location::all();
        $allapply = Apply::all();
        if(count($types)%4==0) $var=count($types)/4;
        else $var = floor(count($types)/4)+1;
        return view('page.typeofjob',compact('var','type_of_job','types','category','location','sumofjobs','alluser','allapply'));
    }

    public function showJob($id)
    {
        $user_name = Session('user');
        $sumofjobs = Job::all();
        $alluser = User::all();
        $category = Category::all();
        $location = Location::all();
        $allapply = Apply::all();
        $types = TypeOfJob::all();
        $job = Job::find($id); 
        $exist = DB::table('apply')
            ->join('job', 'apply.idJob', '=', 'job.Id')
            ->when($id, function ($query) use ($id) {
                    return $query->where('apply.idJob', $id);
                })
            ->when($user_name, function ($query) use ($user_name) {
                    return $query->where('apply.username', $user_name);
                })
            ->first();  
        if ($exist == null) {
            $result = 'not exist';          
        } else {
             $result = 'exist';
        }     

        return view('page.jobdetail', compact('job', 'result','types','sumofjobs','category','location','allapply','alluser'));
    }

    public function store(Request $request, $id){
        $apply = new Apply;
        $apply->idJob = $id;
        $apply->username = Session('user');
        $apply->save();

        return redirect()->back()->with('thongbao1','Nộp đơn thành công!');
        
    }

    public function searchjob(Request $request){
        $cat = $request->catname;
        $searchlocation = $request->searchlocation;
        $jobname = $request->input('jobname');
        $types = TypeOfJob::all();
        $category = Category::all();
        $location = Location::all();
        $sumofjobs = Job::all();
        $allapply = Apply::all();
        $alluser = User::all();
        if(count($types)%4==0) $var=count($types)/4;
        else $var = floor(count($types)/4)+1;


        if($request->has('jobname')){
            if ($cat == 'novalue'){
                if ($searchlocation == 'novalue'){
                    $jobs = Job::where(function ($query) use ($jobname){
                        $query->where('title', 'like', '%'.$jobname.'%')
                        ->orWhere('description', 'like', '%'.$jobname.'%');
                         })->orderBy('deadline','desc')
                        ->get();
                    }
                else
                {
                    $jobs = Job::where('location','like','%'.$searchlocation.'%')
                        ->where(function ($query) use ($jobname){
                        $query->where('title', 'like', '%'.$jobname.'%')
                        ->orWhere('description', 'like', '%'.$jobname.'%');
                         })->orderBy('deadline','desc')
                        ->get();
                }

            }
            else {
                if ($searchlocation == 'novalue'){
                    $jobs = Job::where('idCategory',$cat)
                        ->where(function ($query) use ($jobname){
                        $query->where('title', 'like', '%'.$jobname.'%')
                        ->orWhere('description', 'like', '%'.$jobname.'%');
                         })->orderBy('deadline','desc')
                        ->get();
                }
                else{
                    $jobs = Job::where('location','like','%'.$searchlocation.'%')
                        ->where('idCategory',$cat)
                        ->where(function ($query) use ($jobname){
                        $query->where('title', 'like', '%'.$jobname.'%')
                        ->orWhere('description', 'like', '%'.$jobname.'%');
                         })->orderBy('deadline','desc')
                        ->get();
                }

            }
        }

         
         else{
            if ($cat = 'novalue'){
                if ($searchlocation == 'novalue')
                    $jobs = Job::all();
                else{
                    $jobs = Job::where('location','like','%'.$searchlocation.'%')
                            ->orderBy('deadline','desc')
                            ->get();
                }

            }
            else {
                if ($searchlocation == 'novalue'){
                    $jobs = Job::where('idCategory',$cat)
                            ->orderBy('deadline','desc')
                            ->get();
                }
                else{
                    $jobs = Job::where('location','like','%'.$searchlocation.'%')
                        ->where('idCategory',$cat)
                        ->orderBy('deadline','desc')
                        ->get();
                }


        }
    }    
        return view('page.search',compact('var','jobs','types','category','location','sumofjobs','alluser','allapply'));
}
}
