<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix',
        'type_article_id',
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_articles')->withPivot('quantite');
    }

    public function tailles()
    {
        return $this->belongsToMany(Taille::class, 'article_tailles');
    }

    public function typearticles()
    {
        return $this->belongsTo(TypeArticle::class);
    }

}
