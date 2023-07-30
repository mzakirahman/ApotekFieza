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
        Schema::create('obatmasuk', function (Blueprint $table) {
            $table->string('kode_om');
            $table->string('kode_obat');
            $table->date('tgl_msk');
            $table->string('nama_obat');
            $table->string('no_faktur');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('harga');
            $table->string('no_batch');
            $table->date('expired');
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
        Schema::dropIfExists('obatmasuk');
    }
};
