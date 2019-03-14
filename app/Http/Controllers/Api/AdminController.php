<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Transaction;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function allTransactions(){
        $get_transactions = Transaction::all();

        return response()->json($get_transactions, 200);
    }

}
