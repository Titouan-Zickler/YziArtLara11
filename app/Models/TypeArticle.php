<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeArticle extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type_article',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
