<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentmail extends Model
{
    protected $table = 'sentmail';

    protected $fillable = ['mail_to','mail_ccc','mail_bcc','subject','message','attachment','status'];

    public $timestamps = true;
}
