<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetambaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petambak', function (Blueprint $table) {
            $table->increments('id_petambak');
            $table->integer('id_pelaporan')->unsigned()->nullable();
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
            $table->text('komoditi')->nullable();
            $table->text('jumlah_kolam')->nullable();
            $table->text('luas')->nullable();
            $table->text('jumlah_ton')->nullable();
            $table->text('pakan')->nullable();
            $table->text('harga_pakan')->nullable();
            $table->text('jumlah_terpakai')->nullable();

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
        Schema::dropIfExists('petambak');
    }
}
