<?php

namespace App\Http\Controllers\api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\settingRscource;
use App\Models\Setting;
use Illuminate\Http\Request;

class settingcontroller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $setting=Setting::find(4);
        if( $setting)
        return ApiResponse::sendResponse(200,'the settings get',new settingRscource($setting) );
    else
    return ApiResponse::sendResponse(200,'the settings not found',[] );
        // return  settingRscource::collection( $setting) ;
    }
}
