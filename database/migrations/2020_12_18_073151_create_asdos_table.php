<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asdos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('birthday_place')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('username_elen')->nullable();
            $table->string('bank')->nullable();
            $table->string('norek')->nullable();
            $table->string('atasnama')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            
            
            
            

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
        Schema::dropIfExists('asdos');
    }
}
