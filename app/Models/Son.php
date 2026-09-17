<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Son extends Model
{
    /** @use HasFactory<\Database\Factories\SonFactory> */
    use HasFactory;
    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function ambiance()
    {
        return $this->belongsTo(Ambiance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

}


