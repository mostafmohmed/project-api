<?php

namespace App\Http\Controllers\api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\addRequesr;
use App\Http\Resources\Adrescource;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->paginate(10);
        if (count($ads) > 0) {
            if ($ads->total() > $ads->perPage()) {
                $data = [
                    'records' => Adrescource::collection($ads),
                    'pagination links' => [
                        'current page' => $ads->currentPage(),
                        'per page' => $ads->perPage(),
                        'total' => $ads->total(),
                        'links' => [
                            'first' => $ads->url(1),
                            'last' => $ads->url($ads->lastPage()),
                        ],
                    ],
                ];
            } else {
                $data = Adrescource::collection($ads);
            }
            return ApiResponse::sendResponse(200, 'Ads Retrieved Successfully', $data);
        }
        return ApiResponse::sendResponse(200, 'No Ads available', []);
    }
    
    public function latest()
    {
        $ads = Ad::latest()->take(2)->get();
        if (count($ads) > 0) {
            return ApiResponse::sendResponse(200, 'Latest Ads Retrieved Successfully', Adrescource::collection($ads));
        }
        return ApiResponse::sendResponse(200, 'There are no latest ads', []);
    }










    public function search(Request $request)
    {
        $word = $request->has('search') ? $request->input('search') : null;
        $ads = Ad::when($word != null, function ($q) use ($word) {
            $q->where('title', 'like', '%' . $word . '%');
        })->latest()->get();
        if (count($ads) > 0) {
            return ApiResponse::sendResponse(200, 'Search completed', Adrescource::collection($ads));
        }
        return ApiResponse::sendResponse(200, 'No matching data', []);
    }


public function create(addRequesr $request){
    
    $data=$request->validated();
$data['user_id']= $request->user()->id;

 $r= Ad::create($data);
   if($r) return ApiResponse::sendResponse(201, 'Your Ad created successfully', new Adrescource($r));
//ApiResponse::sendResponse(201, 'Your Ad created successfully', new Adrescource ($data));
}


}
