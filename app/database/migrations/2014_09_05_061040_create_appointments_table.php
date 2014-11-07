<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table)
		{
            $table->increments('id');

            $table->unsignedInteger('expert_id');
            $table->unsignedInteger('user_id');

            $table->string('name', 255);
            $table->string('url', 255);
            $table->string('description', 1000);
            $table->dateTime('appointment_date');
            $table->string('status', 20);

            $table->timestamps();

            $table->foreign('expert_id')->references('id')->on('experts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('appointments', function(Blueprint $table)
		{
			//
		});
	}

}
