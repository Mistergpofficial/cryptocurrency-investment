<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Referral;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   /* public function add_referrals($id)
    {
        $transact = Transaction::where('id', $id)->where('status', 'ACTIVATED')->get();
        //$amount = $transact->amount;
        $trans = $transact->user->upline->get();
      //  $ref = 0.01 * $amount;
        Referral::create([
            'transaction_id' => $transact->id,
            'username' => $trans,
          //  'amount' => $ref,
        ]);
    }*/
}
