<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cities = [
            [
                'name' => 'Kyoto',
                'country_code' => 'jp'
            ],
            [
                'name' => 'Nagoya',
                'country_code' => 'jp'
            ],
            [
                'name' => 'Osaka',
                'country_code' => 'jp'
            ],
            [
                'name' => 'Sapporo',
                'country_code' => 'jp'
            ],
            [
                'name' => 'Tokyo',
                'country_code' => 'jp'
            ],
            [
                'name' => 'Yokohama',
                'country_code' => 'jp'
            ],
        ];

        foreach($cities as $city) {
            if (!City::where('name', $city['name'])->exists()) {
                City::create($city);
            }
        }
    }
}
