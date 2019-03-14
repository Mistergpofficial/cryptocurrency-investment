<?php

namespace App\Http\Controllers\Api;

use App\Models\Announcement;
use App\Models\Link;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\UserPlan;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function link()
    {
        $user = Auth()->user();
        $link = Link::where('user_id', $user->id)->first();
        //$link = Link::all();
        return response()->json($link, 200);
    }


    public function dashboard2()
    {
        $user = Auth::user()->username;
        $check = User::where('upline', $user)->count();

        if(empty($check)){
            return response()->json([], 422);

        }
        return response()->json($check, 200);
    }

    public function referrals()
    {
        $user = Auth::user()->username;
        $check = User::where('upline', $user)->simplePaginate(7);
        return response()->json($check, 200);
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'btc' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);

        if (Auth()->user()->id == $request->id) {
            $requestData = $request->all();
            unset($requestData['_token']);

            // Update to db

            $user = new User();
            $user->where('id', $request->id)->update($requestData);

            return response()->json($user, 200);
        }
        return response()->json([], 422);



    }

    /*public function update_profile_picture(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => 'required|image64:jpeg,jpg,png'
        ]);
        if ($validator->passes()) {
            $exploded = explode(',', $request->image);

            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';

            $theImages = "";
            $fileName = str_random().'.'.$extension;
           // $path = public_path('images').'/'.$fileName;
            $path = public_path('images/').$fileName;
            //$path = public_path().'/'.$fileName;

            file_put_contents($path, $decoded);
            $theImages = $fileName;
        }else{
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        User::where('id', Auth::user()->id)->update(['pro_pic' => $theImages]);
        return response()->json(['error'=>false]);

    }
*/

    public function update_profile_picture(Request $request){
        // \Log::info($request->all());
        $validator = Validator::make($request->all(), [
            'image' => 'required|image64:jpeg,jpg,png'
        ]);
        if ($validator->passes()) {
            $exploded = explode(',', $request->image);

            $decoded = base64_decode($exploded[1]);

            if(str_contains($exploded[0], 'jpeg'))
                $extension = 'jpg';
            else
                $extension = 'png';

            $theImages = "";
            $fileName = str_random().'.'.$extension;
            $path = public_path('crypto_images/').$fileName;

            file_put_contents($path, $decoded);
            $theImages = $fileName;
        }else{
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        User::where('id', Auth::user()->id)->update(['pro_pic' => $theImages]);
        return response()->json(['error'=>false]);

    }



    /*  public function invoice(){

          $invoice = Auth::user()->transactions()->get();

        //  $user = Auth::user();
         // $invoice = Transaction::where('user_id', $user->id)->simplePaginate();
          return response()->json($invoice);
      }*/

    /*public function pay_to(){
          $user = User::first();
          if(empty($user)){
              return response()->json([], 422);

          }
          return response()->json($user, 200);

    }*/

    public function postMessage(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        $mail = Mail::send('emails.message', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('no-reply@cms.com');
            $message->subject($data['subject']);
        });

        return response()->json($mail);
    }

    public function getStatus()
    {
        $status = Auth::user()->transactions();
    }



    public function apiWithdraw()
    {

        $user = Auth::user();
        $bal = "";
        $ref = '';
        $balance = Transaction::where('user_id', $user->id)->where('achieved', 'yes')->where('day_count', '>=', 7)->get();
        $referral = Referral::where('sponsor_username', $user->username)->get();
        if(count($referral) > 0)
            $ref = $referral->sum('amount'); //1300
        if(count($balance) > 0)
            $bal = $balance->sum('returns'); //1300
        $bal = floatval($bal);
            $bal = number_format($bal);
            $bal = str_replace(",", "", $bal);
            $deposit = $balance->sum('amount');
            $sum = $bal + $ref;
            $sum = number_format($sum);
            $sum = str_replace(",", "", $sum);
        return response()->json([
            'bal' => $bal,
            'deposit' => $deposit,
            'sum' => $sum,
        ]);

    }

    public function apiWithdraw1()
    {

        $user = Auth::user();
        $bal = "";
        $ref = '';
        $balance = Transaction::where('user_id', $user->id)->where('achieved', 'yes')->get();
        $referral = Referral::where('sponsor_username', $user->username)->get();
        $ref = $referral->sum('initial_amount'); //1300
        $bal = $balance->sum('initial_returns'); //1300
        $deposit = $balance->sum('amount');
        $sum = $bal + $ref;
        return response()->json([
            'bal' => $bal,
            'deposit' => $deposit,
            'sum' => $sum,
        ]);
    }

    public function apiReferralWithdraw()
    {

        $user = Auth::user();
        $ref = '';
        $referral = Referral::where('sponsor_username', $user->username)->get();
        if(count($referral) > 0)
            $ref = $referral->sum('amount'); //1300
        return response()->json([
            'ref' => $ref
        ]);
    }








    public function referralCalculate()
    {

        $user = Auth::user();
        $ref = "";
        $referral = Referral::where('sponsor_username', $user->username)->get();
           // $ref = $referral->sum('initial_amount'); //1300
        return response()->json($referral);
    }

    // deposit stuff here

    public function depositCount()
    {

        $user = Auth::user();
        $def = "";
        $deposit = Transaction::where('user_id', $user->id)->count();
        if(count($deposit) > 0)
            $def = $deposit;
        return response()->json($def);
    }

    public function clientDeposit()
    {

        // $user = Auth::user();
        $def = "";
        $def = Transaction::where('user_id', '=' , Auth()->user()->id)->orderBy('created_at')->simplePaginate(5);
        /* if(count($deposit) > 0)
             $def = $deposit;*/
        return response()->json($def);
    }

    public function withdrawalCount()
    {

        $user = Auth::user();
        $with = "";
        $withdrawal = Withdraw::where('user_id', $user->id)->count();
        if(count($withdrawal) > 0)
            $with = $withdrawal;
        return response()->json($with);
    }



    public function clientWithdrawal()
    {
        $def = "";
        $def = Withdraw::where('user_id', '=' , Auth()->user()->id)->orderBy('created_at')->simplePaginate(5);
       /* if(count($deposit) > 0)
            $def = $deposit;*/
        return response()->json($def);
    }


      public function getAuthContracts()
    {   

        //$balance = Auth::user()->transactions()->where('achieved', 'yes')->get();
        $balance = Auth::user()->transactions()->get();
       
        return response()->json($balance);

    }


    public function getContracts()
    {

        $deposit = "";
        $balance = Auth::user()->transactions()->simplePaginate(5);
        if(count($balance) > 0)
            $deposit = $balance; //1300

        // $sum = $bal + $ref;

        return response()->json($deposit);

    }

  /*  public function getAuthReferral()
    {

        $user = Auth::user();
        $referral = Referral::where('sponsor_username', $user->username)->get();


        return response()->json($referral);

    }*/

    public function invoice()
    {

        $depo = "";
        $balance = Auth::user()->transactions()->simplePaginate(5);
        if(count($balance) > 0)
            $depo = $balance; //1300

        // $sum = $bal + $ref;

        return response()->json($depo);

    }

    public function announcement(){
        $announcement = Announcement::orderBy('created_at', 'desc')->simplePaginate(4);
        return response()->json($announcement);
    }

     public function getNotifications() {
      // $notification =  DB::table('notifications')->where('upline_username', Auth::user()->username)->get();
        $notification = Auth::user()->unreadNotifications;
        return response()->json($notification, 200);
    }

    public function read(Request $request){
        Auth::user()->unreadNotifications()->find($request->id)->markAsRead();
    }

    public function dashboardTransactions(){
        $dashboardTrans = Transaction::orderBy('created_at', 'desc')->get();
        return response()->json($dashboardTrans);
    }








}



