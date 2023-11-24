<?php

namespace App\Http\Controllers\api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\massagerequest;
use App\Models\Massage;
use Illuminate\Http\Request;

class MassageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke( massagerequest $request)
    {
        $data=$request->validated();
         $recourd= Massage::create($data);
if( $recourd){
    return ApiResponse::sendResponse(201,'the massage created',[] );
}
    }
}
