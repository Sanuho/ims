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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->String('item_cd')->unique();
            $table->String('item_nm');
            $table->String('cust_pn')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('unit_id');
            $table->String('pck_unit_cd');
            $table->foreignId('customer_id');
            $table->foreignId('location_id');
            $table->integer('buy_price')->nullable();
            $table->integer('sel_price')->nullable();
            $table->integer('active_flg');
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
        Schema::dropIfExists('items');
    }
};
