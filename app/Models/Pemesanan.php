<?php

namespace App\Models;

use App\Models\User;
use App\Models\Guide;
use App\Models\Supir;
use App\Models\Wisata;
use App\Models\Kendaraan;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
     
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }

    public function vehicle(){
        return $this->belongsTo(Kendaraan::class);
    }

    public function driver(){
        return $this->belongsTo(Supir::class);
    }

    public function guide(){
        return $this->belongsTo(Guide::class);
    }

    public function notification(){
        return $this->belongsTo(Notification::class);
    }

}
