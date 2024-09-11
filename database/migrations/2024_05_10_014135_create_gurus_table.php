<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id_guru');
            $table->integer('id_agama')->unsigned()->nullable();
            $table->integer('id_matpel')->unsigned()->nullable();
            $table->integer('id_jabatan')->unsigned()->nullable();
            $table->integer('id_pendidikan')->unsigned()->nullable();
            $table->integer('nip')->unsigned()->unique();
            $table->string('nama', 50)->nullable();
            $table->enum('kelamin', ['l', 'p'])->comment('l: laki - laki, p: perempuan')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tmp_lahir', 25)->nullable();
            $table->text('alamat')->nullable();
            $table->binary('foto')->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('instagram', 50)->nullable();

            $table->integer('by_users')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('id_agama')->references('id_agama')->on('agama')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_matpel')->references('id_matpel')->on('matpel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pendidikan')->references('id_pendidikan')->on('pendidikan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
