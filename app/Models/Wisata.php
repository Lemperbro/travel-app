<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\Jemput;
use App\Models\Equipment;
use App\Models\Fasilitas;
use App\Models\Itenerary;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [
        'id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_wisata'
            ]
        ];
    }

    public function kota(){
        return $this->belongsTo(Kota::class);
    }
    public function itenerary(){
        return $this->hasMany(Itenerary::class);
    }
    public function fasilitas(){
        return $this->hasMany(Fasilitas::class);
    }
    public function jemput(){
        return $this->hasMany(Jemput::class);
    }
    public function equipment(){
        return $this->hasMany(Equipment::class);
    }
}
