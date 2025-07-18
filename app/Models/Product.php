<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'umkm_id',
        'name',
        'description',
        'image_url',
        'estimated_price'
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
