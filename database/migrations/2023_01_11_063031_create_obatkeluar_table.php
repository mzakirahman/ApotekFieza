<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obatkeluar', function (Blueprint $table) {
            $table->string('kode_ok');
            $table->string('kode_obat');
            $table->string('nama_obat');
            $table->date('tgl_klr');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('harga');
            $table->integer('total');
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
        Schema::dropIfExists('obatkeluar');
    }
};
