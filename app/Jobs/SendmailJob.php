<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendMail;
use Mail;
use App\Customers;
use App\Message;

class SendmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->data['emails'] as $key => $email){
            $customers = Customers::where('email',$email)->first()->toArray();
            Message::create([
                'email_id' => $customers['id'],
                'title' => $this->data['title'],
                'subject' => $this->data['subject'],
                'message' => $this->data['messages'],
                'attachment' => $this->data['filename']
            ]);
            Mail::to($email)->queue(new SendMail($this->data,$key));
        }
    }
}
