<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Notifications\NotifyUser;
use App\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm(){
        return view('pages.auth.register');
    }


    public function ntui(Request $request){
        $user = $request->query('ref');
        return view('pages.auth.ref_register', compact('user'));
    }

    public function postRegistrationForm(Request $req)
    {
        $data = $req->all();
        $this->validation($req);

        /* User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'btc' => $request->btc,
            'upline' => $request->upline,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'role_id' => 2
        ]); */


        $user = new User();
        $user->full_name = $data['full_name'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->phone = $data['phone'];
        $user->btc = $data['btc'];
        $user->eth = $data['eth'];
        $user->upline = $data['upline'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->country = $data['country'];
        $user->role_id = 2;
        $user->save();

        $ref = 'http://localhost:8000/account/register?ref=';

        Link::create([
            'user_id' => $user->id,
            'username' => $user->username,
            'address' => $ref.''.$user->username
        ]);

        $link = Link::where('username', $data['upline'])->first();
        //$web = $link->user()->get();
        //Log::info($web);
        //  User::find($link->user->id)->notify(new NotifyUser($link));
        $link->user->notify(new NotifyUser($link));



        session()->flash('success', 'User created successfully!.');
        return redirect()->back();


    }

    public function validation($req)
    {
        return $this->validate($req, [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required',
            'username' => 'required|unique:users,username',
            'upline' => 'required|exists:users,username',
            'btc' => 'required',
            'eth' => 'required',
            'city' => 'required',
            'state' => 'required|string',
            'country' => 'required|string'
        ]);
    }

}
