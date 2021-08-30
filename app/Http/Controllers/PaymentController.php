<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Cheque;
use App\Models\Mission;
use App\Models\MissionPayment;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserAuthController;

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

        if(request()->input('paymentMethod') == 'Cheque'){
            Validator::make(request()->all(), [
                'serial_number' => 'required|integer|between:1000000000000,9999999999999|unique:cheques',
                'screen' => 'required|image',
            ]);
        }

        if ( request()->input('paymentMethod') == 'Card' )
        {
            $paymission = MissionPayment::create([
                'user_id' => auth()->user()->id,
                'mission_id' => $missionTopay->id,
                'payment_method' => 'Virement banquaire',
            ]);
            return redirect()->route('cardCheckout');
        }     
        else{
            if ( request()->input('paymentMethod') == 'Cash')
            {
                $paymission = MissionPayment::create([
                    'user_id' => auth()->user()->id,
                    'mission_id' => $missionTopay->id,
                    'payment_method' => 'Espèce',
                    'status' => 'Payé'
                ]);

                return redirect()->back()->with('message', 'Ordre de mission a été payée!');
            }
            else 
            {
                $paymission = MissionPayment::create([
                    'user_id' => auth()->user()->id,
                    'mission_id' => $missionTopay->id,
                    'payment_method' => 'Chèque',
                    'status' => 'Payé'
                ]);
                
                $imagePath = request()->file('chequeScreen')->store('uploads/cheques', 'public');

                //dd($imagePath);
        
                $cheque = Cheque::create([
                    'user_id' => auth()->user()->id,
                    'mission_id' => $missionTopay->id,
                    'screen' => $imagePath,
                    'serial_number' => request('chequeSN')
                ]);
                // $payWithCheque = ['cheque' => $cheque, 'paymission'  => $paymission];
                // //dd($payWithCheque);

                return redirect()->route('Payments.showMissionPayment',$missionTopay->id);

            }
        }    
    
    }
    public function showMissionPayment($id)
    {
        $paidMission = Mission::findOrFail($id);
        $cheque = Cheque::where('mission_id',$id)->first();
        $payment = MissionPayment::where('mission_id',$id)->first();
        //dd($paidMission);

        return view('payments.details', compact('paidMission','cheque','payment'));
    }
}


