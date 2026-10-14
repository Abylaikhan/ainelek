<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            [
                'full_name' => 'Айсел',
                'text'      => 'Өте жақсы балабақша. Тәрбиешілері керемет,баламыздың жаңа қырларын байқай бастадық.',
            ],
            [
                'full_name' => 'Айжулдыз',
                'text'      => 'Жақсы балабақша. Өкінген жоқпын баламды бергеніме. Басшылық пен тәрбиешімізге рахмет.',
            ],
            [
                'full_name' => 'Асылтай',
                'text'      => 'Қолжетімді бағада өте жақсы балабақша, 5 мезгіл тамақ, кезекті мерекелер, ертеңгіліктер, тұз
                        шахтасы, логопед, бассейн, балалар өте жақсы дамып жатыр.',
            ],
        ];

        foreach ($reviews as $review) {
            if (!Review::query()->where('full_name', $review['full_name'])->exists()) {
                Review::query()->create([
                    'full_name' => $review['full_name'],
                    'text'      => $review['text'],
                ]);
            }
        }
    }
}
