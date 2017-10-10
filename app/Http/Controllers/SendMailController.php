<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestSentmail;
use App\Http\Requests\RequestAddMail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Storage;
use Auth,DB,Mail,File;
use App\User;
use App\Customers;
use App\Message;


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
        $email_to = $request->email_to;
        $email = explode(",",$email_to);
        $title = $request->title;
        $subject = $request->subject;
        $message = $request->message;
        //--------
        // $path = $request->file('attachment')->store('public');
        // return $path;
        // $name = $request->file('attachment')->getClientOriginalName();
        // Storage::move('public/'.$name,'public/upload/'.$name);
        //--------
        foreach($email as $e){
            Mail::to($e)->send(new SendMail($message));

        }

    }
    public function postAddmail(RequestAddMail $request){
        if($request->ajax()){
            Customers::create([
                'email'=>strtolower(trim($request->email3)),
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
    public function postdeleteMail(Request $request){
        if ($request->ajax()) {
            $customers = Customers::find($request->id);
            $customers->delete();
            // error_log($request->id,3,"sendmail.log");
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
