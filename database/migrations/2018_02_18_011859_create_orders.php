<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->decimal('total_sum', 10, 2);
            $table->decimal('supplier_sum', 10, 2);
            $table->decimal('delivery_price', 10, 2);
            $table->decimal('net_sum', 10, 2);
            $table->integer('user_id')->unsigned()->index();
            $table->string('face');
            $table->string('phone');
            $table->text('comments')->nullable();
            $table->integer('order_state_id')->unsigned()->index();
            $table->integer('delivery_address_id')->unsigned()->index();
            $table->timestamp('delivery_at')->nullable();
            $table->integer('service_section_id')->unsigned()->index();
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
        Schema::dropIfExists('orders');
    }
}
