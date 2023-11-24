<?php

namespace App\Http\Controllers\api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
           * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $City=City::get();
        if( $City)
        return ApiResponse::sendResponse(200,'the Citys get',CityResource::collection($City) );
    else
    return ApiResponse::sendResponse(200,'the Citys not found',[] );

    }
}
