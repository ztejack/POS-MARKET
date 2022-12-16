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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_Transaksi')->default(false)->references('id')->on('transaksis');
            // $table->foreignId('id_Produk')->default(false)->references('id')->on('produks');
            $table->string('id_Produk');
            $table->string('kodePrd');
            $table->string('namaPrd');
            $table->string('satuan');
            $table->integer('price');
            $table->integer('modalprice');
            $table->integer('qty');
            $table->integer('subtotal');
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
        Schema::dropIfExists('detail_transaksis');
    }
};
