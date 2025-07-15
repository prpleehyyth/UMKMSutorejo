<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'nib',
        'business_type_id',
        'revenue',
        'halal_certified',
        'address',
        'latitude',
        'longitude',
        'is_verified',
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
