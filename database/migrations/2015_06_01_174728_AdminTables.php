<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists( 'admins' );
		
		Schema::create('admins', function(Blueprint $t){
			$t->increments( 'id' );
			$t->string('email')->unique();
			$t->string('password', 60);
			$t->rememberToken();
			$t->timestamps();
		});

		\App\Admin::create([
			'email' => 'admin@admin.com',
			'password' => Hash::make( '123456' )
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop( 'admins' );
	}

}
