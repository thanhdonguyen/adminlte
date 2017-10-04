<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB,Mail,Auth;
use App\Mail\Resetpass;

class LoginController extends Controller
{
    public function getLogin(){
        if(isset(Auth::user()->name)){
        	return redirect('admin/mail/home');
        }else{
            return view('admin.login.login');
        }
    }
    public function postLogin(Request $request){
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
        $remember = $request->input('remember');
        $auth = Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
            ],$remember);
        // echo $remember;die();
        if($auth){
            return redirect('admin/mail/home')->with('message','Wellcom '.$request->email);
        }
        else
        {
            return redirect('/')->with('message','Login unsuccessful');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
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
    		$name = $email->name;
            // echo $data["token"];die;
            // echo $mailsend.$name;die;
    		// Mail::to($mailsend)->send(new Resetpass($email));
            Mail::send('admin.mail.mailresetpass',['token'=>$email->remember_token,'name'=>$email->name,],function($message) use ($email){
                $message->to($email->email,$email->name)->subject('Reset Password !');
            });
            return redirect()->back()->with('message','Please check email !');
    	}else{
    		return redirect()->back()->with('message','Email not register');
    	}
    }
    public function getResetpass($token){
    	$user = DB::table('users')->where('remember_token',$token)->get();
    	return view('admin.login.resetpass',compact('user'));
    }
    public function postResetpass($token,Request $request){
        $this->validate(request(),
            [
                'email'=>'required',
                'password'=>'required',
                'password_confirm'=>'required|same:password',
            ],
            [
                'email.required'=>'Please enter password current !',
                'password.required'=>'Please enter password !',
                'password_confirm.required'=>'Please enter Re-password !',
                'password_confirm.same'=>'Password no duplicate !'
            ]
        );
        $user = DB::table('users')->where('remember_token',$token)->first();
        // dd($user->password);die;
        $email = $request->email;
        if( $email == $user->email){
            DB::table('users')->where('remember_token',$token)->update([
                'password'=>bcrypt($request->password),
                'remember_token'=>$request->_token
            ]);
        }else{
            return redirect()->back()->with('message','Email fail !');
        }
        return redirect()->route('login')->with('message','Change password successfully');;
        // $2y$10$cGfuKqjtsPepRCO0juY/huVCMfAimNpyeLoPTL2tg4rDkf2y94iES
    }
}
