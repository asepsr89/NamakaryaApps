<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Fasilitas extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
    'debitur_id',
    'cabang_id',
    'mitra_id',
    'tmpLahir',
    'tglLahir',
    'ibuKandung',
    'namaPasangan',
    'tglLahirPasangan',
    'pendidikan',
    'stsKawin',
    'npwp',
    'alamatSkrng',
    'stsTinggal',
    'jnsPekerjaan',
    'tlpPerusahaan',
    'lamaBekerja',
    'penghasilan',
    'bukuNikah',
    'aktaCerai',
    'fotoPeminjam',
    'idCard',
    'suratHrd',
    'suratBekerja',
    'slipGaji',
    'mutasiRekening',
    'kartuBpjs',
    'ijazahTerakhir',
    'institusiLk',
    'verifPerusahaan',
    'kerjaAnalisis',
    'surveiLingkungan',
    'fotoRumah',
    'skoringKredit',
    'denahLokasi',
    'mpp',
    'buktiKepemilikan',
    'shm',
    'fotoAtm',
    'payrollPelunasan',
    'executiveSummary',
    'dokumenTambahan',
    'status',
    'noDebitur',
    'noFasilitas',
    'note',
    'PlafondRekomen'
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class,'cabang_id','id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class,'mitra_id','id');
    }

    public function debitur()
    {
        return $this->belongsTo(Debitur::class,'debitur_id','id');
    }


}
