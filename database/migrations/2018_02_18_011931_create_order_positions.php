<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_positions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->decimal('supplier_price', 10, 2);
            $table->integer('order_id')->unsigned()->index();
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
        Schema::dropIfExists('order_positions');
    }
}
