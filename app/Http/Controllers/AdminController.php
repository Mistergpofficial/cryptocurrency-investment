<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminRegistration;
use App\Models\Announcement;
use App\Models\Link;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function confirm_payment($id)
    {
        $transaction = Transaction::where('id', $id)->update(['status' => 'ACTIVATED', 'status_date' => Carbon::now()]);

        $trans = Transaction::where('id', $id)->where('status', 'ACTIVATED')->get();

        foreach ($trans as $tran) {
            $id = '';
            $amount = '';
            $username = '';
            $userId = '';
            $payment_mode = "";
            $id = $tran->id;
            $amount = $tran->amount;
            $payment_mode = $tran->payment_mode;
            $username = $tran->user->upline;
            $userId = $tran->user->id;



            Referral::create([
                'transaction_id' => $id,
                'user_id' => $userId,
                'amount' => $amount * 0.1,
                'initial_amount' => $amount * 0.1,
                'sponsor_username' => $username,
                'payment_mode' => $payment_mode,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->back();
    }

    public function confirm_withdrawal_payment($id)
    {
       Withdraw::where('id', $id)->update(['status' => 'PAID', 'payment_date' => Carbon::now()]);
               $user_get = Withdraw::where('id', $id)->first();
               // if (count($user_get)) {
             // Transaction::where('user_id', $user_get->user_id)->delete();
                    Transaction::where('user_id', $user_get->user_id)->where('day_count', 30)->update(['bal_after_30days' => DB::raw('returns'), 'rate' => 0, 'day_count' => 0, 'initial_returns' => 0, 'another_returns' => 0, 'balance' => 0, 'returns' => 0, 'withdrawn' => 'NO', 'achieved' => 'NULL',  'status_date' => Carbon::now()]);

                    Withdraw::where('id', $id)->delete();
                //}
               /* if($wnt){
                    Transaction::where('user_id', $wnt->user_id)->update(['achieved' => '', 'status_date' => Carbon::now()]);
                }*/

        return redirect()->back();
    }

    public function confirm_referral_withdrawal_payment($id)
    {
        Withdraw::where('id', $id)->update(['status' => 'PAID', 'payment_date' => Carbon::now()]);
        $user_get = Withdraw::where('id', $id)->first();
    /*    if (count($user_get)) {
            Referral::where('sponsor_username', $user_get->user->username)->delete();

        }*/
        return redirect()->back();
    }


    public function purgeUser($id)
    {
        $user_get = User::where('id', $id)->first();

        User::where('id', $user_get->id)->delete();

        session()->flash('alert-success', 'User Purged Successfully.');

        return redirect()->back();

    }

    public function admin_reg()
    {
        return view('auth.a_register');
    }
    public  function p_admin_reg(adminRegistration $req)
    {
        $data = $req->all();
        $user = User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'btc' => $data['btc'],
            'eth' => $data['eth'],
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
            'role_id' => 1
        ]);

        $ref = 'http://localhost:8000/account/register?ref=';

        Link::create([
            'user_id' => $user->id,
            'username' => $user->username,
            'address' => $ref.''.$user->username
        ]);

        return $user;
    }

    public function announcement()
    {
        return view('pages.announcement');
    }

    public function postAnnouncement(Request $request){
        $this->validate($request,[
            'subject' => 'required',
            'content' => 'required'
        ]);
        $announcement = new Announcement();
        $announcement->subject = $request->input('subject');
        $announcement->content = $request->input('content');
        $announcement->save();
    }

}
