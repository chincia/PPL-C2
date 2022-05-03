<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('pelanggan_id');
            $table->integer('jumlah_barang');
            $table->integer('harga_barang');
            $table->integer('total_penjualan');
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();

            $table->foreign('barang_id')->references('id')->on('barang');
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
