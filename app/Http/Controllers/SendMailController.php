<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestSentmail;
use App\Http\Requests\RequestAddMail;
use Auth,DB,Mail;
use App\User;
use App\Customers;


class SendMailController extends Controller
{
    public function getApi(){
        // $query = $_POST['query'];
        $query = "thanh";
        $customers = User::select('id','email')->where('email','like','%'.$query.'%')->get();
        $email_address = array();
        $len = count($customers);
        for ($i = 0; $i < $len; $i++) {
            $email_address[] = array(
                'id' => $customers[$i]->id,
                'name' => $customers[$i]->email
            );
             echo json_encode($email_address);
        }
    }
    public function getmail(Request $request){
        $customers = Customers::all();
        return view('admin.page.mailbox',compact('customers'));
    }
    public function postmail(RequestSentmail $request){
        // $email_to = $request->mail_to;
        // $email_ccc = $request->mail_ccc;
        // $email_bcc = $request->mail_bcc;
        // $data =
        // [
        //     'email_to' =>  $email_to,
        //     'email_ccc' => $email_ccc,
        //     'email_bcc' => $email_bcc,
        //     'title' => $request->title,
        //     'subject' => $request->subject,
        //     'message' => $request->message,
        //     'attachment' => $request->attachment
        // ];
        // Mail::send('admin.mail.message',['message'=>$request->message],function($message) use ($data){
        //     $mailTo = $data['email_to'];
        //     foreach($mailTo as $to){
        //         $message->to($to);
        //     }
        //     $message->subject($data['subject']);
        // });
        echo $email_to = $request->email_to;
        $email = explode(",",$email_to);
        // print_r($email);
        foreach($email as $e){
            echo $e."</br>";
        }

    }
    public function postAddmail(RequestAddMail $request){
        if($request->ajax()){
            Customers::create([
                'email'=>$request->email3,
                'company'=>$request->company,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'sex'=>$request->sex
            ]);
            return response($request->all());
        }
        return response()->json([
            'data' => $errors
        ]);
    }
    public function postEditMail(Request $request){
        if ($request->ajax()) {
            $customers = Customers::find($request->id);
            $customers->update($request->all());
            return response($request->all());
        }
    }
    public function getEditMail(Request $request){
        if ($request->ajax()) {
            $customers = Customers::find($request->id);
            return response($customers);
        }
    }
    public function getsent(){
    	return view('admin.page.sent');
    }
    public function getread(){
    	return view('admin.page.read');
    }
}
