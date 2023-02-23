<?php

namespace App\Models;

use App\Models\Wisata;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory , Sluggable;

    protected $guarded = [
        'id',
        
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_kota'
            ]
        ];
    }

    public function wisata(){
        return $this->hasMany(Wisata::class);
    }
}
