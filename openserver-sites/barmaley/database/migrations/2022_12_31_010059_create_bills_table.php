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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->double('electricity', 8, 2)->unsigned();
            $table->double('tko', 8, 2)->unsigned();
            $table->double('ku', 8, 2)->unsigned();
            $table->double('st1_elect', 8, 2)->unsigned();
            $table->double('st2_elect', 8, 2)->unsigned();
            $table->double('st3_elect', 8, 2)->unsigned();
            $table->double('st4_elect', 8, 2)->unsigned();
            $table->double('st5_elect', 8, 2)->unsigned();
            $table->double('st6_elect', 8, 2)->unsigned();
            $table->double('st7_elect', 8, 2)->unsigned();
            $table->double('st8_elect', 8, 2)->unsigned();
            $table->double('st9_elect', 8, 2)->unsigned();
            $table->date('bill_date')->unique();
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
        Schema::dropIfExists('bills');
    }
};
