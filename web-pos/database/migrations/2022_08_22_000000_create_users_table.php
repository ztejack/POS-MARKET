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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->default(false);
            $table->string('phonenumber')->default(false);
            $table->string('email')->unique();
            $table->foreignId('level_id')->default(false)->references('id')->on('levels');
            $table->foreignId('perusahaan_id');
            $table->foreignId('satker_id')->default(false)->references('id')->on('satkers');
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('password')->nullable();
            $table->string('password')->default(md5('12345678'));
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
