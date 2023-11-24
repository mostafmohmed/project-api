<?php

namespace App\Http\Controllers\api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\districtResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $dist=District::where('city_id',$request->input('city'))->get();
 
     
        if($dist){
            return ApiResponse::sendResponse(200,'the district get all',districtResource::collection($dist) );
        }
        else

        return ApiResponse::sendResponse(200,'the district not found ',[] );
       
    }
}
