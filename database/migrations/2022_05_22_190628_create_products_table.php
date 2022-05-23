<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->decimal('per_hour_rate', 8, 2);
            $table->string('os')->nullable();
            $table->string('display_size')->nullable();
            $table->integer('no_of_usb_ports')->nullable();
            $table->integer('no_of_hdmi_ports')->nullable();
            $table->string('image');
            $table->string('category');
            $table->bigInteger('user_id');
            $table->tinyInteger('is_rented')->default(0);
            $table->decimal('advance_money', 8, 2);
            $table->decimal('insurance_money', 8, 2);
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
        Schema::dropIfExists('products');
    }
}
