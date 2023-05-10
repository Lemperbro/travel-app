<?php

namespace App\Models;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckoutGroup extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class);
    }
}
