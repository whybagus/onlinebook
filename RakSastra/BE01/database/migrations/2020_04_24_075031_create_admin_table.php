<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('admin');
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_depan', 16);
            $table->string('nama_belakang', 16);
            $table->string('email', 25)->unique();
            $table->string('password', 25);
            $table->bigInteger('no_tlp');
            $table->date('tgl_lahir')->nullable();
            $table->text('alamat');
            $table->string('facebook', 160)->nullable();
            $table->string('instagram', 160)->nullable();
            $table->tinyInteger('usia')->nullable();
            $table->string('gender', 1);
            $table->string('avatar', 160)->nullable();
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
        Schema::dropIfExists('admin');
    }
}
