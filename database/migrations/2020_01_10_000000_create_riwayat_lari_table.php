<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatLariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_lari', function (Blueprint $table) {
            $table->increments('id_exercise')->unique();
            $table->integer('id_user');
            $table->text('koordinat_awal');
            $table->text('koordinat_akhir');
            $table->integer('steps');
            $table->float('ss_bb');
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('id_user')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_lari');
    }
}
