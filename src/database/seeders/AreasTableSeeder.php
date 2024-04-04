<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'area_name' => '東京都',
        ]);
        Area::create([
            'area_name' => '大阪府',
        ]);
        Area::create([
            'area_name' => '福岡県',
        ]);

    }
}
