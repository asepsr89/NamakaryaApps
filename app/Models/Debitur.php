<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Debitur extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

        protected $fillable = [
            'user_id',
            'cabang_id',
            'account_id',
            'accountOfficer_id',
            'perusahaan_id',
            'mitra_id',
            'name',
            'ibuKandung',
            'tglPengajuan',
            'noDebitur',
            'noKtp',
            'alamat',
            'tlp',
            'plafond',
            'namaPerusahaan',
            'sttsDebitu',
            'sttsPengajuan',
        ];

        public function cabang()
        {
            return $this->belongsTo(Cabang::class);
        }

        public function perusahaan()
        {
            return $this->belongsTo(Perusahaan::class);
        }

        public function mitra()
        {
            return $this->hasMany(Mitra::class);
        }


        public function fasilitas()
        {
            return $this->hasMany(Fasilitas::class);
        }


}
