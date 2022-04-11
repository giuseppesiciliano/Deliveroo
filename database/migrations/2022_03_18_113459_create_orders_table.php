<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 50);
            $table->string('customer_lastname', 50);
            $table->string('customer_address', 100);
            $table->string('customer_email', 50);
            $table->string('customer_phone', 15);
            $table->string('notes', 255)->nullable();
            $table->decimal('total_price', 5, 2)->unsigned()->default(0);
            $table->boolean('order_status');
            $table->dateTime('date');
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
        Schema::dropIfExists('orders');
    }
}
