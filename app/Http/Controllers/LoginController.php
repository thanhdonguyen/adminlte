<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB,Mail;
use App\Mail\Resetpass;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('admin.login.login');
    }
    public function postLogin(){
    	$this->validate(request(),
    		[
    		'email'=>'required',
    		'password'=>'required'
    		],
    		[
    		'email.required'=>'Please enter Email address !',
    		'password.required'=>'Please enter Password !'
    		]
    	);
    }
    public function getRegister(){
    	return view('admin.login.register');
    }
    public function postRegister(Request $request){
    	$this->validate(request(),
    		[
    		'name'=>'required',
    		'email'=>'required|unique:users,email',
    		'password'=>'required',
    		'password_confirm'=>'required|same:password'
    		],
    		[
    		'name.required'=>'Please enter name !',
    		'email.required'=>'Please enter email !',
    		'email.unique'=>'Email already exists !',
    		'password.required'=>'Please enter password !',
    		'password_confirm.required'=>'Please enter Re-password !',
    		'password_confirm.same'=>'Password no duplicate !'
    		]
    	);
    	// dd($request->_token);
    	User::create([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>bcrypt($request->password),
    		'remember_token' => $request->_token
    	]);
    	return redirect()->back();
    }
    public function getSendmail(){
    	return view('admin.login.sendmail');
    }
    public function postSendmail(Request $request){
    	$this->validate(request(),
    		[
    		'email'=>'required'
    		]
    	);
    	$email = DB::table('users')->where('email',$request->email)->first();
    	if(count($email)>0){
    		$mailsend = $email->email;
    		// $name = $email->name;
    		Mail::to($mailsend)->send(new Resetpass($email));
    	}else{
    		return redirect()->back()->with('message','Email not register');
    	}
    }
    public function getResetpass($token){
    	$user = DB::table('users')->where('remember_token',$token)->get();
    	return view('admin.login.resetpass',compact('user'));
    }
}
