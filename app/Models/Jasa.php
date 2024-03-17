<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'price',
        'handphone',
    ];

    public function galleries()
    {
        return $this->hasMany(JasaGallery::class);
    }
}
