<?php

namespace Database\Seeders;

use Database\Factories\CompanyRatingFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyRatingFactory::times(100)->create();
    }
}
