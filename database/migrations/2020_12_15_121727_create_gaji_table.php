<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("kode_gaji");
            $table->string("bulan_gaji")->nullable();
            $table->float("total")->nullable();
            
            $table->unsignedBigInteger('insentif_id');
            $table->enum('status',['accepted','progress','paid'])->nullable();
            $table->foreign('insentif_id')->references('id')->on('insentif');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('presensi_id')->nullable();
            $table->foreign('presensi_id')->references('id')->on('presensi')->onDelete('cascade');

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
        Schema::dropIfExists('gaji');
    }
}
