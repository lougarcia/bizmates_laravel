<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Resources\CitiesResource;

class CityService
{
    public function search($keyword)
    {
        try {
            $cities = City::where('name', 'LIKE', '%'.$keyword.'%')->get();

            return CitiesResource::collection($cities);

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
