<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeforms', function (Blueprint $table) {
            $table->id();
            $table->string('sold')->nullable();
            $table->string('discount')->nullable();
            $table->string('save')->nullable();
            $table->string('image')->nullable();
            $table->string('Oprice')->nullable();
            $table->string('Dprice')->nullable();
            $table->string('expires');
            $table->string('useonline')->nullable();
            $table->string('use')->nullable();


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
        Schema::dropIfExists('homeforms');
    }
}
