<?php

namespace App\Models;

use App\Models\Kategori_Article;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [
        'id'
    ];





    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul',
                'onUpdate' => true,
            ],
        ];
    } 

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($article) {
            $article->slug = SlugService::createSlug($article, 'slug', $article->judul);
        });
    }

    
    public function Kategori_Article(){
        return $this->hasMany(Kategori_Article::class);
    }
}
