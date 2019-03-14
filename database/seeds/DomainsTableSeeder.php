<?php

use Illuminate\Database\Seeder;
use App\Models\Domain;

class DomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domains = ["https://primecryptooptions.com", "http://client2.domain.com"];

        foreach ($domains as $domain){
            Domain::create(["domain" => $domain]);
        }
    }
}
