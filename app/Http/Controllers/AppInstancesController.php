<?php

namespace App\Http\Controllers;

use App\ApplicationInstance;
use Illuminate\Http\Request;

class AppInstancesController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {
        return view('app-instance.app-instance');
    }

    public function registerApp(Request $request){

        $AppInstance = new ApplicationInstance;
        $AppInstance->phone_details = $request->input('phone_details');
        $AppInstance->verification_status = 'false';
        $AppInstance->registration_status = 'false';

        $AppInstance->save();

        return response()->json(['status' => 'success', 'message' => 'Application-instance added' , 'instance' => $AppInstance->id ]);

    }
}
