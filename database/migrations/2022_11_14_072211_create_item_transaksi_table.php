<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string("id_transaksi", 12);
            $table->string('kode_barang', 7);
            $table->integer("sub_total");
            $table->integer("qty");
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
            $table->foreign('kode_barang')->references('kode_barang')->on('barang');
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
        Schema::dropIfExists('item_transaksi');
    }
}
