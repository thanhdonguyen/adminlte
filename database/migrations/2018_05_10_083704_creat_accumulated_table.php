<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatAccumulatedTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('accumulated', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('hospital_id')->nullable();
			$table->year('year');
			$table->text('result');
			$table->timestamps();
			$table->string('create_by', 255)->nullable();
			$table->string('update_by', 255)->nullable();
			$table->integer('is_deleted');

			$table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('accumulated');
	}
}
