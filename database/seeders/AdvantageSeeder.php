<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            [
                'title'       => 'Бала',
                'description' => '400',
            ],
            [
                'title'       => 'Топ',
                'description' => '12',
            ],
            [
                'title'       => 'Тәрбиеші',
                'description' => '30',
            ],
            [
                'title'       => 'Ұйірме',
                'description' => '5',
            ],
        ];

        foreach ($values as $value) {
            if (!Advantage::query()->where('title', $value)->exists()) {
                Advantage::query()->create([
                    'title'       => $value['title'],
                    'description' => $value['description'],
                ]);
            }
        }
    }
}
