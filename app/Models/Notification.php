<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pemesanan(){
        return $this->belongsTo(Pemesanan::class);
    }


}
