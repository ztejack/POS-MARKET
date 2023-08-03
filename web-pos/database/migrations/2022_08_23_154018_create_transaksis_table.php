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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->default(false)->references('id')->on('users');
            $table->boolean('metode_Byr');
            // $table->foreignId('id_tagihan')->references('id')->on('tagihans')->nullable()->default(NULL);
            $table->foreignId('id_tagihan')->nullable()->default(NULL);
            $table->integer('total_Byr');
            // $table->timestamps()->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
