<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'jasa_id',
        'image',
    ];
}
