<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\ExternalService;
use Carbon\Carbon;
use DataTables;
use App\User;

class ExternalServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveService(Request $request)
    {
        $user = $request->user();
        $urlLayer = $request->input("addWmsService");
        $nameLayer = $request->input("addWmsLayer");
        $serviceLayer = $request->input("addServiceName");
        $serviceType = $request->input("addWmsType");

        $externalService = new ExternalService;
        $externalService->user_id = $user->id;
        $externalService->nama = $serviceLayer;
        $externalService->url_service = $urlLayer;
        $externalService->layer_service = $nameLayer;
        $externalService->jenis_service = $serviceType;
        $externalService->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $externalService->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $externalService->save();

        return redirect()->route('map');
    }

}
