<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class SendMailController extends Controller
{
    public function getmail(){
    	$user = User::all();
        return view('admin.page.mailbox',compact('user'));
    }
    public function postmail(Request $request){
    	$this->validate(request(),
    		[
    			'select_to'=>'required',
    			'message'=>'required'
    		],
    		[
    			'select_to.required'=>'Please enter mail to !',
    			'message.required'=>'Please enter message !'
    		]
    	);
    	
    	$email_to = $request->select_to;
        foreach($email_to as $to){
            echo "To : ".$to."<br>";
        }
        // $email_ccc = $request->select_ccc;
        // foreach($email_ccc as $ccc){
        //     echo "Ccc : ".$ccc."<br>";
        // }
        // $email_bcc = $request->select_bcc;
        // foreach($email_bcc as $bcc){
        //     echo "Bcc : ".$bcc."<br>";
        // }
        echo $request->subject;
        echo $request->message;
        echo $request->attachment;
    }
    public function getsent(){
    	return view('admin.page.sent');
    }
    public function getread(){
    	return view('admin.page.read');
    }
}
