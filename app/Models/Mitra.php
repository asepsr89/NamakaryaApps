<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    
         protected $fillable = [
         'name',
         'tlp',
         'alamat',
         'statusSlik',
         ];

    public function Slik()
    {
        return $this->hasMany(Slik::class);
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }
}
