<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';

    protected $fillable = ['email','company','first_name','last_name','sex','message_id'];

    public $timestamps = true;
}
