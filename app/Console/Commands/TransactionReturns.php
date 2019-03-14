<?php

namespace App\Console\Commands;

use App\Models\Transaction;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TransactionReturns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TransactionReturns:transactionreturns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the transactions activated after 30 days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = Carbon::now(new \DateTimeZone('Africa/Lagos'));

        Transaction::where('status', 'ACTIVATED')->where('registras_plan', 'Basic Plan')->whereRaw('status_date '>=' $today, INTERVAL 30 DAY)')->update(['rate' => DB::raw('rate + 1.071428571428571'), 'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'), 'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::where('status', 'ACTIVATED')->where('registras_plan', 'StartUp Plan')->whereRaw('status_date '>=' $today, INTERVAL 30 DAY)')->update(['rate' => DB::raw('rate + 1.428571428571429'), 'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'),  'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::where('status', 'ACTIVATED')->where('registras_plan',  'Standard Plan')->whereRaw('status_date '>=' $today, INTERVAL 30 DAY)')->update(['rate' => DB::raw('rate + 1.785714285714286'), 'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'),  'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::where('status', 'ACTIVATED')->where('registras_plan',  'Premium Plan')->whereRaw('status_date '>=' $today, INTERVAL 30 DAY)')->update(['rate' => DB::raw('rate + 2.142857142857143'),  'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'),  'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::where('status', 'ACTIVATED')->where('registras_plan', 'Platinum Plan')->whereRaw('status_date '>=' $today, INTERVAL 30 DAY)')->update(['rate' => DB::raw('rate + 2.5'),  'another_returns' => DB::raw('initial_returns'), 'balance' => DB::raw('returns'),  'initial_returns' => DB::raw('rate / 100 * amount'), 'returns' => DB::raw('bal_after_30days + rate / 100 * amount')]);

        Transaction::where('status', 'ACTIVATED')->where('status_date' ,'>=' , Carbon::now()->subDays(7))->update(['achieved' => 'Yes']);




        /*  Transaction::where('withdrawn', 'NO')->where('status', 'ACTIVATED')->where('day_count', '>=', 7)->where('returns', '==' ,  0)->update(['achieved' => 'Yes', 'returns' => DB::raw('initial_returns')]);

        Transaction::where('withdrawn', 'YES')->where('status', 'ACTIVATED')->where('day_count', '>=', 7)->where('returns', '==',  0)->update(['achieved' => 'Yes',  'returns' => DB::raw('returns + (initial_returns - another_returns)')]);*/
/*
        Transaction::where('withdrawn', 'NO')->where('status', 'ACTIVATED')->where('day_count', '>=', 7)->where('returns', '!=', 0)->update(['returns' => DB::raw('initial_returns')]);*/


        Transaction::where('withdrawn', 'NO')->where('status', 'ACTIVATED')->where('status_date' ,'>=' , Carbon::now()->subDays(7))->where('returns', '!=', 0)->update(['returns' => DB::raw('returns')]);

        Transaction::where('withdrawn', 'YES')->where('status', 'ACTIVATED')->where('status_date' ,'>=' , Carbon::now()->subDays(7))->where('returns', '!=', 0)->update(['achieved' => 'Yes',  'returns' => DB::raw('balance + (initial_returns - another_returns)')]);


        Transaction::where('withdrawn', 'YES')->where('status', 'ACTIVATED')->where('status_date' ,'>=' , Carbon::now()->subDays(7))->where('returns', '==', 0)->update(['achieved' => 'Yes',  'returns' => DB::raw('initial_returns - another_returns')]);



        //   Transaction::where('status', 'ACTIVATED')->where('status_date' ,'<' , Carbon::now()->subDays(30))->update(['achieved' => 'Yes', 'returns' => DB::raw('returns + initial_returns') ]);
        return $this->info('Achieved');
        //User::where('status' , 'PAID')->get();

    }


}
