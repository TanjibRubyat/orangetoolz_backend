<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            $table->region;
            $table->country;
            $table->item;
            $table->type;
            $table->sales_channel;
            $table->order_priority;
            $table->order_date;
            $table->order_id;
            $table->ship_date;
            $table->units_sold;
            $table->unit_price;
            $table->unit_cost;
            $table->total_pevenue;
            $table->total_cost;
            $table->total_profit;

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
        Schema::dropIfExists('admins');
    }
}
