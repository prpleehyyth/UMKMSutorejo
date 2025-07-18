<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aspiration extends Model
{
    use HasFactory;

    protected $fillable = ['umkm_id', 'message', 'response'];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
