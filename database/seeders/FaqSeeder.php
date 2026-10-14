<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 2; $i++) {
            Faq::query()->create([
                'question' => 'INDIGO-НЫҢ АВТОМАТТАНДЫРЫЛҒАН СЕРВИСІ',
                'answer'    => '<p>балабақшаны немесе шағын орталықты үйден шықпай-ақ таңдау</p>'
            ]);
        }
    }
}
