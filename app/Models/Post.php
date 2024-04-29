<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'date',
        'description',
        'categorie_post_id',
    ];

    public function categorieposts()
    {
        return $this->belongsTo(CategoriePost::class);
    }
}
