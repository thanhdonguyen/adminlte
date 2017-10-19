<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    protected $table = 'message';

    protected $fillable = ['email_id','title','subject','message','attachment','status'];

    public $timestamps = true;

    // public function mailsent () {
    // 	return $this->hasMany('App\Mailsent');
    // }
}
