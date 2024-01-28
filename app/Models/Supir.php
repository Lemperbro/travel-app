<?php

namespace App\Models;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supir extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class);
    }
    
}
