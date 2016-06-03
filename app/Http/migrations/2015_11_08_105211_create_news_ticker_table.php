<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTickerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news_ticker', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', '500')->nullable();
			$table->text('details')->nullable();
			$table->enum('priority', array('High','Medium','low'))->nullable();
			$table->boolean('is_active');
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
		Schema::drop('news_ticker');
	}

}
