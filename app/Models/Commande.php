<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix',
        'user_id',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'commande_articles')->withPivot('quantite');
    }
}
