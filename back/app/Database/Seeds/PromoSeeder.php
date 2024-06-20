<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promos')->insert([
            [
                'title' => 'Promo1',
                'description' => 'Description1Description1Description1',
                'promo_start_date' => '01-06-2024 12:00:00',
                'promo_end_date' => '30-06-2024 12:00:00',
            ],
            [
                'title' => 'Promo2',
                'description' => 'Description2Description2Description2',
                'promo_start_date' => '10-06-2024 12:00:00',
                'promo_end_date' => '30-06-2024 12:00:00',
            ],
            [
                'title' => 'Promo3',
                'description' => 'Description3Description3Description3',
                'promo_start_date' => '15-06-2024 12:00:00',
                'promo_end_date' => '25-06-2024 12:00:00',
            ],
            [
                'title' => 'Promo4',
                'description' => 'Description4Description4Description4',
                'promo_start_date' => '01-06-2024 12:00:00',
                'promo_end_date' => '05-06-2024 12:00:00',
            ],
            [
                'title' => 'Promo4',
                'description' => 'Description4Description4Description4',
                'promo_start_date' => '01-07-2024 12:00:00',
                'promo_end_date' => '30-07-2024 12:00:00',
            ],
        ]);
    }
}