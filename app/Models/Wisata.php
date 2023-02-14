<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\Jemput;
use App\Models\Fasilitas;
use App\Models\Itenerary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function kota(){
        return $this->belongsTo(Kota::class);
    }
    public function itenerary(){
        return $this->belongsTo(Itenerary::class);
    }
    public function fasilitas(){
        return $this->belongsTo(Fasilitas::class);
    }
    public function jemput(){
        return $this->hasMany(Jemput::class);
    }
}
