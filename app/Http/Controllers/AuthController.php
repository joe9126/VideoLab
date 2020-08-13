<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Response,Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;
use Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
 

class AuthController extends Controller{
    public function __construct()
    {
    }

    //POST SIGN-IN

    public function post_signin(Request $request){
       $user_data = array(
            'email'=>$request->get('loginemail'),
            'password'=>$request->get('pword')
        );
        $temp_url = $request->session()->get('temp_url',function(){return url('');});

        if(Auth::attempt($user_data)){
           $user_data = Auth::user();
            Session::put("userid",$user_data->name);
            $status = 1; 
            
             $msg = $user_data->name.",Welcome!"; 
        }else{
            //return back()->with('error','Opps! Your password or username is incorrect!');
             $status = 0;
             $msg = "Opps! Incorrect password or username!"; 
            
        }
         return response()->json(["status"=>$status,"msg"=>$msg,'temp_url'=>$temp_url]);
    }

    
    public function show($id){
       return view('user.profile');
    }

    public function edit(){}
    public function update(){}
    public function destroy(){}

    public function store(Request $request){
        $userdata = $request->all();
        $accounts = User::where('email',$request->get('email'))->get();
        if(sizeof($accounts)>0){
            $status = 0; $msg = "Oops! That email is taken!";
        }else{
            $useraccount = DB::table('users')
            ->insert([
                'name'=>$userdata['userid'],
                'email'=>$userdata['email'],
                'password'=>Hash::make($userdata['password']),
                'usertype'=>'User',
                'status'=>'1',
                'remember_token'=>Str::random(10),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
            if(isset($useraccount)){ $status = 1; $msg = "Welcome to Videlab.com!";}
            else{ $status = 0; $msg = "Oops! Your email or password isn't correct!";}
        }
        return response()->json(["status"=>$status,"msg"=>$msg]);
    }

public function logout(Request $request){
        Auth::logout();
        Session::flush();
       return Redirect::to($request->get('currentpath'));
       /* if(Auth::check()){
            $status = 1;
        }else{
            $status=0;
        }
        return response()->json(["status"=>$status]);*/
}

public function checkLogin(Request $request){
     $status=0;
    if (Auth::check()) {
        $status =1;
    }
     
     $request->session()->put('temp_url',$request->get('currentpath'));
      

    return response()->json(['status'=>$status]);

}

public function confirmLogin(Request  $request){
    $status =0;
     $request->session()->put('temp_url',$request->get('currentpath'));

    if(Auth::check()){
        $status=1;
    }
     
    return response()->json(['status'=>$status]);
}
}
