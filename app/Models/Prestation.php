<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix',
        'type_prestation_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'reservation_prestations')->withPivot('date_prestation');
    }

    public function typeprestations()
    {
        return $this->belongsTo(TypePrestation::class);
    }
}
