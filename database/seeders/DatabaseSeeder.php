<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(AdvantageSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
