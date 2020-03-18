<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Countrylist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countrylist', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->text('country');
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
        Schema::dropIfExists('countrylist');
    }
}
