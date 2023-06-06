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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debitur_id');
            $table->foreignId('cabang_id');
            $table->string('noFasilitas');
            $table->string('noDebitur');
            $table->string('tmpLahir');
            $table->date('tglLahir');
            $table->string('namaPasangan')->nullable();
            $table->date('tglLahirPasangan')->nullable();
            $table->string('pendidikan');
            $table->string('stsKawin');
            $table->string('npwp')->nullable();
            $table->string('alamatSkrng');
            $table->string('stsTinggal');
            $table->string('jnsPekerjaan');
            $table->string('namaPerusahaan');
            $table->string('tlpPerusahaan');
            $table->string('lamaBekerja');
            $table->bigInteger('penghasilan');
            $table->string('bukuNikah');
            $table->string('aktaCerai')->nullable();
            $table->string('fotoPeminjam');
            $table->string('idCard');
            $table->string('suratHrd');
            $table->string('suratBekerja');
            $table->string('slipGaji');
            $table->string('mutasiRekening');
            $table->string('kartuBpjs');
            $table->string('ijazahTerakhir');
            $table->string('institusiLk');
            $table->string('verifPerusahaan');
            $table->string('kerjaAnalisis');
            $table->string('surveiLingkungan');
            $table->string('fotoRumah');
            $table->string('skoringKredit');
            $table->string('denahLokasi');
            $table->string('mpp');
            $table->string('buktiKepemilikan');
            $table->string('shm');
            $table->string('fotoAtm');
            $table->string('payrollPelunasan');
            $table->string('executiveSummary');
            $table->string('dokumenTambahan');
            $table->string('status');
            $table->string('alasan')->nullable();
            $table->string('note')->nullable();
            $table->string('notemitra')->nullable();
            $table->bigInteger('PlafondRekomen');
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
        Schema::dropIfExists('fasilitas');
    }
};
