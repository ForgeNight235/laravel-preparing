<?php

namespace Database\Seeders;

use App\Models\Good;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoodsSeeder extends Seeder
{

    public function run(): void
    {
        for ($i=1; $i<=9 ; $i++)
        {
            Good::query()->create([
                'title' => 'Полотенце "Москва город"',
                'short_text' => '50х90 см',
                'image_path' => 'public/images/moscow_blank.jpg',
                'is_published' => '1',
                'ordered' => '0'
            ]);
        }
    }
}
