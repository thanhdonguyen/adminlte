<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $key;

    public function __construct(array $data, $key)
    {
        $this->data = $data;
        $this->key = $key;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // print_r($this->$customer);die;
        if(empty($this->data['path'])){
            return $this->view('admin.mail.message')
                        ->subject($this->data['subject']);
        }else{
            return $this->view('admin.mail.message')
                        ->subject($this->data['subject'])
                        ->attach($this->data['path']);
        }
    }
}
