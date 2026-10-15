<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    /** @use HasFactory<\Database\Factories\FavoriFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'son_id', 'commentaire'];
}
