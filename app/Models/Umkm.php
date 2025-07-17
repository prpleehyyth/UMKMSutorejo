<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{

    // App\Models\Umkm.php
    protected $fillable = [
        'name',
        'nib',
        'business_type_id',
        'revenue',
        'halal_certified',
        'address',
        'google_maps_link',
        'is_verified',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function aspirations()
    {
        return $this->hasMany(Aspiration::class);
    }

    public function businessType()
    {
        return $this->belongsTo(BusinessType::class, 'business_type_id');
    }
}
