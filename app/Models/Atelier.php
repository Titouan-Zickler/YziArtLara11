<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix',
        'date',
        'type_atelier_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'reservation_ateliers');
    }

    public function typeateliers()
    {
        return $this->belongsTo(TypeAtelier::class);
    }
}
