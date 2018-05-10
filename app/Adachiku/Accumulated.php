<?php

namespace App\Adachiku;

use Illuminate\Database\Eloquent\Model;

class Accumulated extends Model {
	protected $table = 'accumulated';

	protected $fillable = ['hospital_id', 'year', 'result', 'create_by', 'update_by', 'is_deleted'];

	public $timestamps = true;

	public function hospital() {
		return $this->belongsTo('App\Adachiku\Hospital');
	}
}
