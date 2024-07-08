<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\OpenWeatherMapService;
use App\Services\FourSquareService;

class Search extends Controller
{
    protected $openWeatherMapService;
    protected $fourSquareService;

    public function __construct(
        OpenWeatherMapService $openWeatherMapService,
        FourSquareService $fourSquareService
    ) {
        $this->openWeatherMapService = $openWeatherMapService;
        $this->fourSquareService = $fourSquareService;
    }

    public function places(Request $request): JsonResponse
    {
        $data = $this->fourSquareService->fetchData(
            $request->query('city_name'),
            $request->query('country_code')
        );

        return $data;
    }

    public function forecasts(Request $request): JsonResponse
    {
        $data = $this->openWeatherMapService->fetchData(
            $request->query('city_name'),
            $request->query('country_code')
        );

        return $data;
    }
}
