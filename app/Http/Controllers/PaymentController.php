<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Mission;
use App\Http\Controllers\UserAuthController;
use App\Models\MissionPayment;
use App\Models\User;
use Auth;

class PaymentController extends Controller
{
    public function viewMission ($id) {
        
        $missionToview = Mission::findOrFail($id);
        $userTopay = Auth::user()->first();
        request()->session()->put('mission_id',$id);
        return response()->json([
            'mission'=> $missionToview,
            'user'=> $userTopay
        ]);
    }
    public function choosePaymentMethod () {
        
        $id = request()->session()->get('mission_id');
        $missionTopay = Mission::findOrFail($id);
        request()->session()->forget('demand');
        //dd($missionTopay);
        if ( request()->input('paymentMethod') == 'Card' )
        {
            $paymission = MissionPayment::create([
                'user_id' => Auth::user()->id,
                'mission_id' => $missionTopay->id,
                'payment_method' => 'Virement banquaire',
            ]);
            return redirect()->route('cardCheckout');
        }     
        else{ 
            if ( request()->input('paymentMethod') == 'Cash' )
            {
                $paymission = MissionPayment::create([
                    'user_id' => Auth::user()->id,
                    'mission_id' => $missionTopay->id,
                    'payment_method' => 'Espèce',
                    'status' => 'Payé'
                ]);

                return redirect()->back()->with('message', 'Ordre de mission a été payée!');
            }
            else 
            {
                $paymission = MissionPayment::create([
                    'user_id' => Auth::user()->id,
                    'mission_id' => $missionTopay->id,
                    'payment_method' => 'Chèque',
                    'status' => 'Payé'
                ]);
                dd($paymission);

                $data = request()->validate([
                    'serial_number' => 'required|integer|between:999999999,9999999999',
                    'screen' => 'required|image',    
                ]);
        
                $imagePath = request('screen')->store('uploads/cheques', 'public');

                //dd($imagePath);
        
                $cheque = Cheque::create([
                    'user_id' => Auth::user()->id,
                    'mission_id' => $missionTopay->id,
                    'screen' => $imagePath,
                    'serial_number' => $data['serial_number'],
                ]);
                
                return view('payments.details', compact('cheque','paymission'));

            }
        }    
    
    }
    public function showMissionPayment($id)
    {
        $paidMission = Mission::findOrFail($id);
        $cheque = Cheque::where('mission_id',$id)->get();

        return view('payments.details', compact('paidMission','cheque'));
    }
}


