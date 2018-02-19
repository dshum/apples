<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
            $table->integer('order');
            $table->decimal('price', 10, 2);
            $table->decimal('supplier_price', 10, 2);
            $table->boolean('hide')->nullable();
            $table->mediumText('fullcontent')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('new')->nullable();
            $table->boolean('special')->nullable();
            $table->integer('color_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
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
        Schema::dropIfExists('goods');
    }
}
