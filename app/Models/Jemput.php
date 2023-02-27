<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\Wisata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jemput extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];


    public function kota(){
        return $this->belongsTo(Kota::class);
    }
}
