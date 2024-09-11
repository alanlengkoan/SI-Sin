<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agen', function (Blueprint $table) {
            $table->increments('id_agen');
            $table->integer('id_pelaporan')->nullable();
            $table->string('nama', 25)->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->enum('metode_pembayaran', ['cash', 'transfer'])->nullable();
            $table->text('keluhan')->nullable();
            $table->text('keterangan')->nullable();
            $table->binary('foto_satu')->nullable();
            $table->binary('foto_dua')->nullable();
            $table->binary('foto_tiga')->nullable();
            $table->binary('foto_empat')->nullable();
            $table->binary('foto_lima')->nullable();
            $table->text('target')->nullable();
            $table->text('market')->nullable();
            $table->text('jumlah_ton')->nullable();
            $table->text('brand_kompetitor')->nullable();
            $table->text('harga_kompetitor')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_pelaporan')->references('id_pelaporan')->on('pelaporan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agen');
    }
}
