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
            $table->string('analis_number');
            $table->date('tglMpp');
            $table->string('bankName');
            $table->float('loan',19,2);
            $table->float('outstanding',19,2);
            $table->float('angsuran',19,2);
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
