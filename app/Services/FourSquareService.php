<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class FourSquareService
{
    public function fetchData($city_name, $country_code): JsonResponse
    {
        $cacheKey = cacheKeyGenerator('foursquare', $city_name, $country_code);
        $cache = cache($cacheKey);

        if($cache) {
            return response()->json($cache);
        }

        $appid = Config::get('services.foursquare.key');
        $endpoint = Config::get('services.foursquare.places_url');
        $cache_lifespan = (int) Config::get('services.foursquare.cache_lifespan', 3600);

        $url = "{$endpoint}?near={$city_name},{$country_code}";

        try {
            $response = Http::withHeaders([
                'Accept-Language' => 'en',
                'Authorization' => $appid
            ])->withOptions(['verify' => false])->get($url);

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
