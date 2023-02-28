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
        Schema::create('bankloans', function (Blueprint $table) {
            $table->id();
            $table->date('tglMpp');
            $table->string('bankName');
            $table->float('loan');
            $table->float('outstanding');
            $table->float('angsuran');
            $table->string('tujuanPinjaman');
            $table->string('keterangan');
            $table->string('statusPinjaman');
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
        Schema::dropIfExists('bankloans');
    }
};
