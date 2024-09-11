<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->integer('id_agama')->unsigned()->nullable();
            $table->integer('nis')->unsigned()->unique();
            $table->string('nama', 50)->nullable();
            $table->enum('kelamin', ['l', 'p'])->comment('l: laki - laki, p: perempuan')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tmp_lahir', 25)->nullable();
            $table->text('alamat')->nullable();
            $table->string('thn_masuk', 11)->nullable();
            $table->string('thn_lulus', 11)->nullable();
            $table->binary('foto')->nullable();

            $table->integer('by_users')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_agama')->references('id_agama')->on('agama')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
