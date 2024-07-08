<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\JsonResponse;

class OpenWeatherMapService
{
    public function fetchData($city_name, $country_code): JsonResponse
    {
        $cacheKey = cacheKeyGenerator('forecast5', $city_name, $country_code);
        $cache = cache($cacheKey);

        if($cache) {
            return response()->json($cache);
        }

        $appid = Config::get('services.openworldmap.key');
        $endpoint = Config::get('services.openworldmap.url');
        $cache_lifespan = (int) Config::get('services.openworldmap.cache_lifespan', 3600);

        $url = "{$endpoint}?q={$city_name},{$country_code}&appid={$appid}";

        try {
            $response = Http::withOptions(['verify' => false])->get($url);

            $response->throwIf($response->failed() || $response->clientError());

            cache([$cacheKey => $response->json()], now()->addSeconds($cache_lifespan));

            return response()->json($response->json());

        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            return response()->json(
                [
                    'message' => $e->getMessage()
                ],
                $e->getCode()
            );
        }
    }
}
