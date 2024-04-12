<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin', 
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'conge_user')->withTimestamps();
    }
}
