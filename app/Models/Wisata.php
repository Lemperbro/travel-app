<?php

namespace App\Models;

use App\Models\Faq;
use App\Models\Kota;
use App\Models\Event;
use App\Models\Extra;
use App\Models\Harga;
use App\Models\Hotel;
use App\Models\Jemput;
use App\Models\Session;
use App\Models\Equipment;
use App\Models\Fasilitas;
use App\Models\Itenerary;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wisata extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

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
    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class);
    }

    public function faq(){
        return $this->hasMany(Faq::class);
    }

    public function harga(){
        return $this->hasMany(Harga::class);
    }

    public function extra(){
        return $this->hasMany(Extra::class);
    }

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function session(){
        return $this->hasMany(Session::class);
    }

    public function hotel(){
        return $this->hasMany(Hotel::class);
    }
}
