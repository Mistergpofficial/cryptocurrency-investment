<?php

namespace App\Http\Controllers;


use App\Models\UserPlan;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Transaction;
use App\Models\Referral;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;





class HomeController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $users = User::where('role_id', 2)->get();
        $admins = User::where('role_id', 1)->get();
        $def = Transaction::where('user_id' , Auth()->user()->id)->where('achieved', 'Yes')->get();
        $ref = Referral::where('sponsor_username', Auth()->user()->username)->where('amount', '!=', ' "" ')->get();
        /* if(count($deposit) > 0)
             $def = $deposit;*/
        return view('pages.dashboard')->with(compact('users', 'def', 'ref', 'admins'));
        // return view('pages.dashboard');
    }

    public function deposit()
    {
        return view('pages.deposit');
    }

    public function invoice()
    {
      //  $invoices = Auth::user()->transactions()->simplePaginate(5);
        return view('pages.invoice');
    }

    public function postDeposit(Request $request)
    {
        $this->validate($request, [

            'registras_plan' => 'required',
            'amount' => 'required|integer',
            'currency' => 'required',
            'payment_mode' => 'required'
        ]);

        $user = Auth::user();

        $rate = "";
        $payment_mode = "";
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->transact_id = 'P:' . '' . str_random(4);
        $transaction->registras_plan = $request->input('registras_plan');
        $transaction->currency = $request->input('currency');
        $transaction->amount = $request->input('amount');
        $transaction->amount_btc = $request->input('btc');
        $transaction->amount_eth = $request->input('eth');
        if ($request->payment_mode == 'Bitcoin') {
            $payment_mode = 'BTC/hdgdggddg52424225';
        } elseif ($request->payment_mode == 'Ethereum') {
            $payment_mode = 'ETH/drcm456uio5mklo98';
        }
        $transaction->payment_mode = $payment_mode;

       /* if ($request->registras_plan == 'Basic Plan') {
            $rate = 0.3;
        } elseif ($request->registras_plan == 'StartUp Plan') {
            $rate = 0.4;
        } elseif ($request->registras_plan == 'Standard Plan') {
            $rate = 0.6;
        } elseif ($request->registras_plan == 'Premium Plan') {
            $rate = 0.8;
        } elseif ($request->registras_plan == 'Platinum Plan') {
            $rate = 1.2;
        }*/
        $transaction->rate = 0;
        /*
        $transaction->returns = $request->input('amount') * $rate;*/
        $transaction->returns = 0;
        $transaction->initial_returns = 0;
        //$transaction->initial_returns = $request->input('amount') * $rate;
        $transaction->save();

        UserPlan::create([
            'user_id' => $user->id,
            'plan_name' => $transaction->registras_plan,
        ]);

    }

    /*public function depositUpdate(Request $request){

        $this->validate($request,[
            'amount' => 'required',
            'registras_plan' => 'required'
        ]);

        $transaction = Transaction::find($request->input('id'));
        $rate = "";
         $user = Auth::user();


            if ($request->registras_plan == 'Basic Plan') {
                $rate = 0.15;
            } elseif ($request->registras_plan == 'Standard Plan') {
                $rate = 0.2;
            } elseif ($request->registras_plan == 'Premium Plan') {
                $rate = 0.25;
            } elseif ($request->registras_plan == 'Gold Plan') {
                $rate = 0.3;
            }

                $transaction->update([
                    'amount' => $request->input('amount'),
                    'registras_plan' => $request->input('registras_plan'),
                    'amount_btc' => $request->input('btc'),
                    'amount_eth' => $request->input('eth'),
                    'rate' => $rate,
                    'returns' => $request->input('amount') * $rate
                ]);

        return response()->json($transaction);
    }*/




    public function destroy($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        Transaction::where('id', $transaction->id)->delete();


        session()->flash('alert-success', 'Transaction deleted Successfully.');

        return redirect()->back();
    }

    public function destroyWithdrawal($id)
    {
        $withdrawal = Withdraw::where('id', $id)->first();
        Withdraw::where('id', $withdrawal->id)->delete();
        $user = Auth::user();
        $amount = '';
        $bal = '';
        $ref = '';
        $amount1 = '';
        $returns = '';
        $returns1 = '';
        // 3
        $balance = Transaction::where('user_id', $user->id)->where('achieved', 'yes')->get();
        $referral = Referral::where('sponsor_username', $user->username)->get();
        $retrieve = $withdrawal->amount;  //2000
        $count = count($balance);       //3
        $count1 = count($referral);  // 1
        $count2 = $count + $count1; //4
        $retrieve1 = $retrieve / $count2; // 666.7 // returns
        $retrieve2 = $retrieve / $count2;
        foreach ($balance as $bal){
            $returns = $bal->returns;
        }
        foreach ($referral as $ref){
            $returns1 = $ref->amount;
        }

        if (count($balance) > 0) {
            Transaction::where('user_id', $user->id)->where('achieved', 'yes')->update(['returns' => $returns + $retrieve1]);
        }

        if (count($referral) > 0) {
            Referral::where('sponsor_username', $user->username)->update(['amount' => $returns1 + $retrieve2]);

        }


        session()->flash('alert-success', 'Transaction deleted Successfully.');

        return redirect()->back();
    }





    public function transaction()
    {
       /* $invoices = Auth::user()->transactions()->simplePaginate(5);
        $withdrawals = Auth::user()->withdrawals()->withTrashed()->simplePaginate(5);*/
        return view('pages.transaction');
    }

    public function profile()
    {

        return view('pages.profile');
    }



        public function update_profile_picture(Request $request)
        {

            $validator = Validator::make($request->all(), [
                'image' => 'required|image64:jpeg,jpg,png'
            ]);
            if ($validator->passes()) {
                $exploded = explode(',', $request->image);

                $decoded = base64_decode($exploded[1]);

                if (str_contains($exploded[0], 'jpeg'))
                    $extension = 'jpg';
                else
                    $extension = 'png';

                $theImages = "";
                $fileName = str_random() . '.' . $extension;
                // $path = public_path('images').'/'.$fileName;
                $path = public_path('crypto_images/') . $fileName;
                //$path = public_path().'/'.$fileName;

                file_put_contents($path, $decoded);
                $theImages = $fileName;
            } else {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            User::where('id', Auth::user()->id)->update(['pro_pic' => $theImages]);
            return response()->json(['error' => false]);

        }

        public function getMessage()
        {
            return view('pages.message');
        }

        public function transactions()
        {
            // $transactions = Transaction::all()->paginate(2);
            $transactions = Transaction::simplePaginate(5);
            // Add referral transaction as well
            return view('pages.transactions', compact('transactions'));
        }

        public function manageUsers()
        {
            $users = User::where('role_id', 2)->simplePaginate(8);
            return view('pages.manage-users', compact('users'));
        }

        public function withdraw()
        {
            $user = Auth::user();
            $bal = '';
            $ref = '';
            $sum = '';
            $balance = Transaction::where('user_id', $user->id)->where('achieved', 'yes')->where('day_count', '>=', 7)->get();
            $reInvest = Transaction::where('user_id', $user->id)->where('achieved', 'yes')->first();
            $reInvest = json_decode($reInvest, true);
            if(count($balance) > 0)
                $bal = $balance->sum('returns'); //1300
            $bal = floatval($bal);
                $bal = number_format($bal);
                $bal = str_replace(",", "", $bal);
            $referral = Referral::where('sponsor_username', $user->username)->get();
            if (count($referral) > 0)
                $ref = $referral->sum('amount'); //1300
            $sum = $bal + $ref;
            $sum = number_format($sum);
            $sum = str_replace(",", "", $sum);
            return view('pages.withdraw', compact('balance', 'referral', 'sum', 'reInvest'));
        }

        public function postWithdraw(Request $request)
        {
            $this->validate($request, [
                'amount' => 'required',
                'payment_mode' => 'required|not_in:0'
            ]);
            $user = Auth::user();
            $amount = '';
            $bal = '';
            $ref = '';
            $amount1 = '';
            $balance = Transaction::where('user_id', $user->id)->where('achieved', 'yes')->where('day_count', '>=', 7)->get();
            $referral = Referral::where('sponsor_username', $user->username)->get();
            if (count($balance) > 0)
                $bal = $balance->sum('returns'); //92000
            $bal = floatval($bal);
                $bal = number_format($bal);
                $bal = str_replace(",", "", $bal);
            if (count($referral) > 0)
                $ref = $referral->sum('amount'); //15000
            $sum = $bal + $ref;
            $sum = number_format($sum);
            $sum = str_replace(",", "", $sum);
            if ($request->amount < $sum) {
                $amount = $sum - $request->amount; //57000
                $count = count($balance) + count($referral);
                $amount1 = $amount / $count;
                Transaction::where('user_id', $user->id)->where('achieved', 'yes')->update(['returns' => $amount1, 'withdrawn' => 'YES']);
                Referral::where('sponsor_username', $user->username)->update(['amount' => $amount1]);
            } elseif ($request->amount == $sum) {
                $amount = $sum - $request->amount;
                $count = count($balance) + count($referral);
                $amount1 = $amount / $count;
                Transaction::where('user_id', $user->id)->where('achieved', 'yes')->update(['returns' => $amount1, 'withdrawn' => 'YES']);
                Referral::where('sponsor_username', $user->username)->update(['amount' => $amount1]);
            }
            $withdraw = new Withdraw();
            $withdraw->user_id = $user->id;
            $withdraw->amount = $request->input('amount');
            $withdraw->payment_mode = $request->input('payment_mode');
            $withdraw->type = $request->input('total');
            $withdraw->save();

            return redirect()->back();



        }

        public function postReferralWithdrawal(Request $request)
        {
            $this->validate($request, [
                'amount' => 'required',
                'payment_mode' => 'required|not_in:0'
            ]);
            $user = Auth::user();
            $amount = '';
            $bal = '';
            $ref = '';
            $amount1 = '';
            $referral = Referral::where('sponsor_username', $user->username)->get();
            if (count($referral) > 0)
                $ref = $referral->sum('amount'); //1300
            if ($request->amount < $ref) {
                $amount = $ref - $request->amount;
                $count = count($referral);
                $amount1 = $amount / $count;
                Referral::where('sponsor_username', $user->username)->update(['amount' => $amount1]);
            } elseif ($request->amount == $ref) {
                $amount = $ref - $request->amount;
                $count = count($referral);
                $amount1 = $amount / $count;
                Referral::where('sponsor_username', $user->username)->update(['amount' => $amount1]);
            }
            $withdraw = new Withdraw();
            $withdraw->user_id = $user->id;
            $withdraw->amount = $request->input('amount');
            $withdraw->payment_mode = $request->input('payment_mode');
            $withdraw->type = $request->input('referral');
            $withdraw->save();

            return redirect()->back();

        }

        public function postReinvestTotal(Request $request){
            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name" => false,
                ),
            );
            $url1 = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/', false, stream_context_create($arrContextOptions));
            $vrl = $url1;
            $json= json_decode($vrl, true);
            $btc = $json[0]["price_usd"];


            $tick = file_get_contents('https://api.coinmarketcap.com/v1/ticker/ethereum/', false, stream_context_create($arrContextOptions));
            $url = $tick;
            $data= json_decode($tick, true);
            $eth = $data[0]["price_usd"];


            $user = Auth::user();
            $amount = '';
            $bal = '';
            $payment_mode = "";
            $ref = '';
            $amount1 = '';
            $balance = Transaction::where('user_id', $user->id)->where('achieved', 'yes')->where('day_count', 30)->get();
            // $balance = Transaction::where('user_id', $user->id)->where('achieved', 'yes')->get();
            $referral = Referral::where('sponsor_username', $user->username)->get();
            foreach ($balance as $bnl) {
                $payment_mode = $bnl->payment_mode;
            }

                if (count($balance) > 0)
                $bal = $balance->sum('returns'); //1300
            if (count($referral) > 0)
                $ref = $referral->sum('amount'); //1300
            $sum = $bal + $ref;
           // $balanced = json_decode($balance, 'true');
           // $payment_mode = $balanced->payment_mode;
            Transaction::where('user_id', $user->id)->where('achieved', 'yes')->update(['rate' => 0, 'day_count' => 0,  'returns' => 0,  'initial_returns' => 0, 'another_returns' => 0, 'balance' => 0, 'withdrawn' => 'NO', 'achieved' => 'NULL', 'status_date' => Carbon::now()]);
            // Transaction::where('user_id', $user->id)->where('achieved', 'yes')->delete();
                Referral::where('sponsor_username', $user->username)->delete();
                $plan = "";
                $rate = "";

            $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->transact_id = 'P:' . '' . str_random(4);
        if($sum >= '1000' && $sum <= '10000 '){
               $plan = 'Basic Plan';
        } elseif ($sum >= '10001' && $sum <= '30000' ) {
             $plan = 'StartUp Plan';
        } elseif ($sum >= '30001' && $sum <= '50000' ) {
             $plan = 'Standard Plan';
        } elseif ($sum >= '50001' && $sum <= '100000' ) {
             $plan = 'Premium Plan';
        } elseif ($sum >= '100001' && $sum <= '1000000' ) {
             $plan = 'Platinum Plan';
        }
        $transaction->registras_plan = $plan;
        $transaction->currency = 'USD';
        $transaction->amount = $sum;
      /*  $transaction->amount_btc = '0.000987645';
        $transaction->amount_eth = '0.908765432';*/
        $transaction->amount_btc = $sum / $btc;
        $transaction->amount_eth = $sum / $eth;
       /* if ($payment_mode == 'Bitcoin') {
            $payment_mode = 'BTC/hdgdggddg52424225';
        } elseif ($payment_mode == 'Ethereum') {
            $payment_mode = 'ETH/drcm456uio5mklo98';
        }*/
//            $transaction->payment_mode = 'BITCOIN';
            $transaction->payment_mode = $payment_mode;
      /*   if ($plan == 'Basic Plan') {
            $rate = 0.3;
         } elseif ($plan == 'StartUp Plan') {
             $rate = 0.4;
        } elseif ($plan == 'Standard Plan') {
            $rate = 0.6;
        } elseif ($plan == 'Premium Plan') {
            $rate = 0.8;
        } elseif ($plan == 'Platinum Plan') {
            $rate = 1.2;
        }*/
        $transaction->rate = 0;
            $transaction->returns = 0;
            $transaction->initial_returns = 0;
        /*$transaction->returns = $sum * $rate;
        $transaction->initial_returns = $sum * $rate;*/
        $transaction->save();

        return redirect()->back();


        }

         public function postReinvestReferral(Request $request){
             $arrContextOptions=array(
                 "ssl"=>array(
                     "verify_peer"=>false,
                     "verify_peer_name" => false,
                 ),
             );
             $url1 = file_get_contents('https://api.coinmarketcap.com/v1/ticker/bitcoin/', false, stream_context_create($arrContextOptions));
             $vrl = $url1;
             $json= json_decode($vrl, true);
             $btc = $json[0]["price_usd"];


             $tick = file_get_contents('https://api.coinmarketcap.com/v1/ticker/ethereum/', false, stream_context_create($arrContextOptions));
             $url = $tick;
             $data= json_decode($tick, true);
             $eth = $data[0]["price_usd"];


             $user = Auth::user();
            $amount = '';
            $bal = '';
            $ref = '';
            $amount1 = '';
             $payment_mode = "";
            $referral = Referral::where('sponsor_username', $user->username)->get();

             if (count($referral) > 0)
                $ref = $referral->sum('amount'); //1300
                Referral::where('sponsor_username', $user->username)->delete();
                $plan = "";
                $rate = "";

             foreach ($referral as $rdm) {
                 $payment_mode = "";
                 $payment_mode = $rdm->payment_mode;
             }




                 $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->transact_id = 'P:' . '' . str_random(4);
        if($ref >= '1000' && $ref <= '10000 '){
               $plan = 'Basic Plan';
        } elseif ($ref >= '10001' && $ref <= '30000' ) {
             $plan = 'StartUp Plan';
        } elseif ($ref >= '30001' && $ref <= '50000' ) {
             $plan = 'Standard Plan';
        } elseif ($ref >= '50001' && $ref <= '100000' ) {
             $plan = 'Premium Plan';
        } elseif ($ref >= '100001' && $ref <= '1000000' ) {
             $plan = 'Platinum Plan';
        }
        $transaction->registras_plan = $plan;
        $transaction->currency = 'USD';
        $transaction->amount = $ref;
    /*    $transaction->amount_btc = '0.000987645';
        $transaction->amount_eth = '0.908765432';*/
        $transaction->amount_btc = $ref / $btc;
        $transaction->amount_eth = $ref / $eth;
      /*  if ($payment_mode == 'Bitcoin') {
            $payment_mode = 'BTC/hdgdggddg52424225';
        } elseif ($payment_mode == 'Ethereum') {
            $payment_mode = 'ETH/drcm456uio5mklo98';
        }*/
//        $transaction->payment_mode = 'BITCOIN';
             $transaction->payment_mode = $payment_mode;
       /*  if ($plan == 'Basic Plan') {
            $rate = 0.3;
         } elseif ($plan == 'StartUp Plan') {
             $rate = 0.4;
        } elseif ($plan == 'Standard Plan') {
            $rate = 0.6;
        } elseif ($plan == 'Premium Plan') {
            $rate = 0.8;
        } elseif ($plan == 'Platinum Plan') {
            $rate = 1.2;
        }*/
        $transaction->rate = 0;
             $transaction->returns = 0;
             $transaction->initial_returns = 0;
       /* $transaction->returns = $ref * $rate;
        $transaction->initial_returns = $ref * $rate;*/
        $transaction->save();

        return redirect()->back();


        }





        public function withdrawals()
        {
          //  $withdrawals = Withdraw::withTrashed()->simplePaginate(5);
            $withdrawals = Withdraw::simplePaginate(5);
            return view('pages.withdrawals', compact('withdrawals'));
        }

    public function withdrawals_recycle_bin()
    {
        $withdrawals = Withdraw::withTrashed()->simplePaginate(5);
        return view('pages.withdrawals_recycle', compact('withdrawals'));
    }


        public function referrals()
        {
            return view('pages.referrals');
        }

}
