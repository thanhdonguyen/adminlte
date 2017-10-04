<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    protected $fillable = ['mail_to','mail_ccc','mail_bcc','subject','message','attachment','status'];

    public $timestamps = true;

    // public function mailsent () {
    // 	return $this->hasMany('App\Mailsent');
    // }
}
