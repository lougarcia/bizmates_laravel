<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CityService;

class CitiesController extends Controller
{

    protected $cityService;

    public function __construct(
        CityService $cityService
    ) {
        $this->cityService = $cityService;
    }

    public function index(Request $request)
    {
        return $this->cityService->search($request->query('keyword'));
    }
}
