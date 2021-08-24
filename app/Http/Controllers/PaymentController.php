<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function viewMission ($id) {
        
        $missionToview = Mission::findOrFail($id)->load('getUsers');
        return response()->json($missionToview);
    }

    public function StoreMissionPayment ($id) {
        $missionTopay = Mission::findOrFail($id)->load('getUsers');
        
    }
}


