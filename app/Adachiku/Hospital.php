<?php

namespace App\Adachiku;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model {
	protected $table = 'hospital';

	protected $fillable = ['name', 'create_by', 'update_by', 'is_deleted'];

	public $timestamps = true;

	public function accumulated() {
		return $this->hasMany('App\Adachiku\Accumulated');
	}
}
