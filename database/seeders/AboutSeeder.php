<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title'   => 'Біз туралы',
                'content' => '<p>ЖШС «Айнелёк» балабақшасының тәрбие-білім процессі жыл бойы бес күндік жұмыс уақытымен жүзеге
                        асырылады.
                        Балалардың болуы 10,5 сағат. 2 жастан 6 жасқа дейін 12 топ, оның
                        ішінде 8 қазақ және 4 орыс тілді топтар. Оқыту екі тілде жүргізіледі.</p>
                    <p>Келесі қызметтерді ұсынады:</p>',
            ],
        ];

        foreach ($data as $value) {
            if (!Page::query()->where('title', $value['title'])->exists()) {
                Page::query()->create([
                    'title'   => $value['title'],
                    'content' => $value['content'],
                ]);
            }
        }
    }
}
