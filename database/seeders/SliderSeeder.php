<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = [
            [
                'title'       => 'Қазақ және орыс тілді топтар.',
                'description' => 'Оқыту екі тілде жүргізіледі.',
            ],
            [
                'title'       => 'Біз балаларды 2 жастан бастап қабылдаймыз!',
                'description' => '',
            ],
        ];

        foreach ($sliders as $value) {
            if (!Slider::query()->where('title', $value['title'])->exists()) {
                Slider::query()->create([
                    'title'       => $value['title'],
                    'description' => $value['description'],
                ]);
            }
        }
    }
}
