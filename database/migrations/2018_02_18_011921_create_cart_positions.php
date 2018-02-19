<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartPositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_positions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('good_id')->unsigned()->index();
            $table->integer('amount');
			$table->timestamps();
			$table->softDeletes(); 
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_positions');
    }
}
