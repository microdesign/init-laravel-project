<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	public function up()
	{
		Schema::create('pages', function ( Blueprint $t ) {
			$t->increments('id');
			$t->string('slug');
			$t->string('title');
			$t->text( 'content' );
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop( 'pages' );
	}

	
}
