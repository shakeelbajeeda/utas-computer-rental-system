<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentedDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rented_devices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->decimal('price', 8, 2);
            $table->decimal('unit_price', 8, 2);
            $table->date('booking_date');
            $table->date('return_date');
            $table->tinyInteger('return_status');
            $table->tinyInteger('is_insurance');
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
        Schema::dropIfExists('rented_devices');
    }
}
