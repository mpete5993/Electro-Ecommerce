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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->nullable();
            $table->string('billing_name');
            $table->string('billing_email');
            $table->string('billing_address');
            $table->string('billing_province');
            $table->string('billing_city');
            $table->string('billing_country');
            $table->string('billing_zip');
            $table->string('billing_phone');
            $table->string('name_on_card');
            $table->string('billing_subtotal');
            $table->string('billing_tax');
            $table->string('billing_total');
            $table->string('payment_gateway')->default('stripe');
            $table->string('shipped')->default(false);
            $table->string('error')->nullable();
            $table->text('order_notes')->nullable();
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
