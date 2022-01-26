<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreExcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_excels', function (Blueprint $table) {
            $table->id();

            $table->string('number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('state');
            $table->string('zip');
            
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
        Schema::dropIfExists('store_excels');
    }
}
