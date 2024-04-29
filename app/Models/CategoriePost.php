<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriePost extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_post',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
