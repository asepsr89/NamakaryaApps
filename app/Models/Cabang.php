<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

     protected $fillable = [
     'name',
     'tlp',
     'alamat',
     ];

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }

    public function accountofficer()
    {
        return $this->hasMany(AccountOfficer::class);
    }

}
