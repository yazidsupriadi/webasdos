<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryAsdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_asdos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status',['active','inactive','suspended'])->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('matkul_id');
            $table->foreign('matkul_id')->references('id')->on('matkul')->onDelete('cascade');
            $table->unsignedBigInteger('tahun_akademik_id');
            $table->foreign('tahun_akademik_id')->references('id')->on('tahun_akademik')->onDelete('cascade');
            
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
        Schema::dropIfExists('history_asdos');
    }
}
