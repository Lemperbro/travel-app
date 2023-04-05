<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori_Article extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function Article(){
        return $this->hasMany(Article::class);
    }
}
