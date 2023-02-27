<?php

namespace App\Models;

use App\Models\Wisata;
use App\Models\Itenerary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fasilitas extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }
    public function itenerary(){
        return $this->hasMany(Itenerary::class);
    }
}
