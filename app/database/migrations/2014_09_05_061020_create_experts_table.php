<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experts', function(Blueprint $table)
		{
            $table->increments('id');

            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('username', 255);
            $table->string('gender', 10);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('country', 100);
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('fees', 50);
            $table->text('about');
            $table->date('date_of_birth');
            $table->string('pic', 128);
            $table->string('status', 20);

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('experts', function(Blueprint $table)
		{
			//
		});
	}

}
