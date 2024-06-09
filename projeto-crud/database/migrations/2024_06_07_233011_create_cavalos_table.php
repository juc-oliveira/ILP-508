<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCavalosTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('cavalos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("raca");
            $table->date("dtNasc")->nullable();
            $table->string("cpfTutor")->unique();
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
        Schema::dropIfExists('cavalos');
    }
};
