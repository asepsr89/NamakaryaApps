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
        Schema::create('debiturs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('cabang_id')->nullable();
            $table->foreignId('mitra_id')->nullable();
            $table->string('name')->nullable();
            $table->date('tglPengajuan')->nullable();
            $table->string('noDebitur')->nullable();
            $table->string('noKtp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tlp')->nullable();
            $table->bigInteger('plafond')->nullable();
            $table->string('ibuKandung')->nullable();
            $table->integer('sttsDebitu')->nullable();
            $table->integer('sttsPengajuan')->nullable();
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
        Schema::dropIfExists('debiturs');
    }
};
