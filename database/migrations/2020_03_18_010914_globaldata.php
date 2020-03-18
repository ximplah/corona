<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Globaldata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globaldata', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->text('cases');
            $table->text('deaths');
            $table->text('recovered');
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
        Schema::dropIfExists('globaldata');
    }
}
