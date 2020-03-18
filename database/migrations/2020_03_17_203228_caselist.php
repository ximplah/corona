<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Caselist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caselist', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countrylist');
            $table->date('date');
            $table->bigInteger('confirmed');
            $table->bigInteger('deaths');
            $table->bigInteger('recovered');
            $table->text('updated_at')->nullable();
            $table->text('created_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caselist');
    }
}
