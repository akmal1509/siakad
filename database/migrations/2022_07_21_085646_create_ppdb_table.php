<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpdbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppdb', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->string('no_usbn')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->integer("tahun_lulus")->nullable();
            $table->string('no_kks')->nullable();
            $table->string("nama_ortu")->nullable();
            $table->text('alamat_ortu')->nullable();
            $table->string("pekerjaan_ortu")->nullable();
            $table->string('agama_ortu')->nullable();
            $table->integer("no_telp_ortu")->nullable();
            $table->string("nama_wali")->nullable();
            $table->text('alamat_wali')->nullable();
            $table->string("pekerjaan_wali")->nullable();
            $table->string('agama_wali')->nullable();
            $table->integer("no_telp_wali")->nullable();
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
        Schema::dropIfExists('ppdb');
    }
}
