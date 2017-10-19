<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestSentmail;
use App\Http\Requests\RequestAddMail;
use App\Mail\SendMail;
use App\Jobs\SendmailJob;
use Auth,DB,Mail,File,Input;
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
        $emails = explode(",",$email_to);
        $title = $request->title;
        $subject = $request->subject;
        $messages = $request->message;
        $attachment = Input::file('attachment');
        if(!empty($attachment)){
            $filename = time()."_".$attachment->getClientOriginalName();
            $attachment->move('upload',$filename);
            $path = 'public/upload/'.$filename;
        }else{
            $path = null;
            $filename = null;
        }
        $customers = Customers::whereIn('email',$emails)->get()->toArray();
        // dd($customers);
        $data = ([
            'messages' => $messages,
            'subject' => $subject,
            'title' => $title,
            'customers' => $customers,
            'emails' => $emails,
            'filename'=> $filename,
            'path' => $path
        ]);
        // dd($data);
        dispatch(new SendmailJob($data));
        return redirect()->back()->with('sendmail','success');

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
    public function getArchive(){
        $archives = DB::table('customers')
                    ->join('message',function($join){
                        $join->on('message.email_id','=','customers.id');
                    })
                    ->get();
        //             foreach($messages as $mes){
        //                 echo $mes->first_name."<br>";
        //             }
        // dd($archives);
        // return response($count_email);
    	return view('admin.page.archive',compact('archives'));
    }
    public function getRead($id){
        // echo $id;die;
        $read = DB::table('customers')
                    ->join('message',function($join) use($id){
                        $join->on('message.email_id','=','customers.id')->where('message.id','=', $id);
                    })
                    ->first();
                    // $read->first_name;
                    // dd($read);
    	return view('admin.page.read',compact('read'));
    }
    public function getCount(Request $request){
        if ($request->ajax()) {
            $count_email = Message::select('id')->count();
            return response($count_email);
        }
    }
    public function getDelete($id){
        $message = Message::find($id);
        $path = $message->toArray();
        $file = public_path().'/upload/'.$path['attachment'];
        // dd($path);
        if(isset($path['attachment'])){
           File::delete($file);
        // dd($message);
        }
        $message->delete();
        return redirect()->route('admin.mail.archive')->with('deletemail','success');
    }
}
