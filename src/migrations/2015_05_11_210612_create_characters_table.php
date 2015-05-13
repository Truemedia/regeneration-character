<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the characters table
		Schema::create('characters', function($table)
		{
		    $table->increments('id');
		    $table->mediumInteger('power_ranking');
		    $table->double('latitude');
		    $table->double('longitude');
		    $table->jsonb('inventory');
		    $table->softDeletes();
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
		// Drop the characters table
		Schema::dropIfExists('characters');
	}

}
