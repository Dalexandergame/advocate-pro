<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Cheque;
use App\Models\Mission;
use App\Models\Clientcompte;
use Illuminate\Http\Request;
use Laravel\Cashier\Billable;
use App\Models\DossierPayment;
use App\Models\MissionPayment;
use App\Models\Dossierjuridique;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
            return redirect()->route('cardCheckout', $id);
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

    public function cardCheckout($id)
    {
        $mission = Mission::findOrFail($id);
        $intent = Auth::user()->createSetupIntent();
        //dd($paidMission);

        return view('payments.cardCheckout', compact('mission','intent'));
    }

    public function pay(Request $request, $id)
    {
        $user          = Auth::user();
        $mission       = Mission::findOrfail($id);
        $paymission    = MissionPayment::where('mission_id',$mission->id)->first();
        $paymentMethod = $request->input('payment_method');
        //dd($request->all());

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($mission->cout * 100 * 0.11, $paymentMethod);

            $paymission->update(['status'=>'Payé']);

        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('paymission')->with('message', 'Product purchased successfully!');
    }

    public function showMissionPayment($id)
    {
        $paidMission = Mission::findOrFail($id);
        $cheque = Cheque::where('mission_id',$id)->first();
        $payment = MissionPayment::where('mission_id',$id)->first();
        //dd($paidMission);

        return view('payments.details', compact('paidMission','cheque','payment'));
    }





    public function dossier_payment_create($id)
    {
        $user = Auth::user();
        $dossier = Dossierjuridique::where('id', $id)->first();
        //dd($client);

        return view('dossierjuridique.payments.create', compact('user','dossier'));
    }

    public function dossier_payment_store($id)
    {
        $user = Auth::user();
        $dossier = Dossierjuridique::where('id',$id)->first();
        $somme = request()->input('somme');

        if(request()->input('paymentMethod') == 'Cheque'){
            Validator::make(request()->all(), [
                'serial_number' => 'required|integer|between:1000000000000,9999999999999|unique:cheques',
                'screen' => 'required|image',
            ]);
        }

        if ( request()->input('paymentMethod') == 'Card' )
        {
            $paydossier = DossierPayment::create([
                'user_id' => $user->id,
                'somme' => $somme,
                'dossier_id' => $dossier->id,
                'payment_method' => 'Virement banquaire',
                'status' => 'Payé',
                'client_id' => $dossier->for->id
            ]);
            return redirect()->route('dossierpayment.details',$dossier->id);
        }     
        else{
            if ( request()->input('paymentMethod') == 'Cash')
            {
                $paydossier = DossierPayment::create([
                    'user_id' => $user->id,
                    'somme' => $somme,
                    'dossier_id' => $dossier->id,
                    'payment_method' => 'Espèce',
                    'status' => 'Payé',
                    'client_id' => $dossier->for->id
                ]);

                return redirect()->route('dossierpayment.details',$dossier->id);
            }
            else 
            {
                $paydossier = DossierPayment::create([
                    'user_id' => $user->id,
                    'somme' => $somme,
                    'dossier_id' => $dossier->id,
                    'payment_method' => 'Chèque',
                    'status' => 'Payé',
                    'client_id' => $dossier->for->id
                ]);
                
                $imagePath = request()->file('chequeScreen')->store('uploads/cheques', 'public');

                //dd($imagePath);
        
                $cheque = Cheque::create([
                    'user_id' => auth()->user()->id,
                    'dossierjuridique_id' => $dossier->id,
                    'screen' => $imagePath,
                    'serial_number' => request('chequeSN')
                ]);
                // $payWithCheque = ['cheque' => $cheque, 'paymission'  => $paymission];
                // //dd($payWithCheque);

                return redirect()->route('dossierpayment.details',$dossier->id);

            }
        }
        


    }

    public function dossier_payment_details($id)
    {
        $user = Auth::user();
        $dossier = Dossierjuridique::where('id',$id)->with('for')->first();
        //dd($dossier);
        $payedDossier = DossierPayment::where('dossier_id', $id)->first();
        $cheque = Cheque::where('dossierjuridique_id',$id)->first();
        //dd($client);

        return view('dossierjuridique.payments.index', compact('user','dossier','payedDossier','cheque'));
    }
}


