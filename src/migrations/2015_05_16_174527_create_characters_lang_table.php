<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersLangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the characters_lang table
		Schema::create('characters_lang', function($table)
		{
			$default_locale = \Config::get('app.locale');
			$locales = \Config::get('app.locales', array($default_locale));

		    $table->increments('id');
		    $table->mediumInteger('character_id');
		    $table->string('firstname')->nullable();
		    $table->string('lastname')->nullable();
		    $table->string('nickname')->nullable();
		    $table->string('overview')->nullable();
		    $table->enum('locale', $locales);
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
		// Drop the characters_lang table
		Schema::dropIfExists('characters_lang');
	}

}
