<?php

namespace App\Models;

use App\Models\Wisata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extra extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];


    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }
}
