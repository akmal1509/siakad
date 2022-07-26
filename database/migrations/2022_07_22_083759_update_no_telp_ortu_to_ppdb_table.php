<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateNoTelpOrtuToPpdbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppdb', function (Blueprint $table) {
            DB::statement('ALTER TABLE ppdb CHANGE no_telp_ortu no_telp_ortu VARCHAR(200)');
            DB::statement('ALTER TABLE ppdb CHANGE no_telp_wali no_telp_wali VARCHAR(200)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ppdb', function (Blueprint $table) {
            //
        });
    }
}
