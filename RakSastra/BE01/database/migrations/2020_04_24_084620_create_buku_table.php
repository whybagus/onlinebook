<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul', 64);
            $table->integer('stock');
            $table->integer('penulis_id');
            $table->bigInteger('harga');
            $table->integer('genre_id');
            $table->string('penerbit', 100);
            $table->text('deskripsi')->nullable();
            $table->string('tebal_halaman', 14)->nullable();
            $table->date('waktu_terbit');
            $table->integer('diskon')->nullable();
            $table->date('diskon_exp')->nullable();
            $table->boolean('new')->nullable()->default(false);
            $table->boolean('promo')->nullable()->default(false);
            $table->boolean('best_seller')->nullable()->default(false);
            $table->integer('terjual')->nullable();
            $table->integer('kali_rating')->nullable();
            $table->integer('nilai_rating')->nullable();
            $table->float('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
