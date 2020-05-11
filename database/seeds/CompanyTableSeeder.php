<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();
        $company -> name = "IPS Preventiva Farallones SAS";
        $company -> nit = "900895359-3";
        $company -> address = "Call 9C # 50 - 25 ( Local 102 )";
        $company -> phone_number = "5133821";
        $company -> save();
    }
}
