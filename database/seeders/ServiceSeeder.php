<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Шахмат',
            'Логопед',
            'Би',
            'Бассейн',
            'Тұз шахтасы',
            'Ағылшын тілі',
        ];

        foreach ($services as $value) {
            $service = Service::query()->where('title', $value)->first();
            if (is_null($service)) {
                Service::query()->create([
                    'title' => $value,
                ]);
            }
        }
    }
}
