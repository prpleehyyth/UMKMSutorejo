<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
