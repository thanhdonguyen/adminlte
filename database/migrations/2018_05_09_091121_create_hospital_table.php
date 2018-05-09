<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('hospital', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->timestamps();
			$table->string('create_by', 255)->nullable();
			$table->string('update_by', 255)->nullable();
			$table->integer('is_deleted');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('hospital');
	}
}
