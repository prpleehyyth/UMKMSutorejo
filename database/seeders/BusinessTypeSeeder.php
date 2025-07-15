<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessType;

class BusinessTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Makanan', 'Minuman', 'Fashion', 'Kerajinan', 'Jasa', 'Lainnya'];

        foreach ($types as $type) {
            BusinessType::create(['name' => $type]);
        }
    }
}
