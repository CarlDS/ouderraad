<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assortiments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id');
            $table->foreignId('article_id')->nullable();
            $table->unsignedDecimal('buy_price')->nullable();
            $table->unsignedDecimal('sell_price');
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
        Schema::dropIfExists('assortiments');
    }
};
