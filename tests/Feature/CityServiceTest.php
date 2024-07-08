<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\CitySeeder;
use App\Services\CityService;


class CityServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_return_all_records_when_keyword_is_empty(): void
    {
        $this->seed(CitySeeder::class);

        $cityService = new CityService;

        $cities = $cityService->search('');

        $this->assertEquals($cities->count(), 6);
    }

    public function test_should_return_empty_data_when_keyword_does_not_match(): void
    {
        $this->seed(CitySeeder::class);

        $cityService = new CityService;

        $cities = $cityService->search('1234');

        $this->assertEquals($cities->count(), 0);
    }

    public function test_should_return_a_number_of_data_matching_the_keyword(): void
    {
        $this->seed(CitySeeder::class);

        $cityService = new CityService;

        $cities = $cityService->search('kyo');

        $this->assertEquals($cities->count(), 2);
    }
}
