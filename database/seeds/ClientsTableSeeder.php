<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = "Jose Alejandro";
        $client->lastname = "Pantoja Giraldo";
        $client->type_dni = "CC";
        $client->dni = "1107078664";
        $client->sex = "M";
        $client->is_active = 1;
        $client->save();

        $client = new Client();
        $client->name = "Cindy Yirley";
        $client->lastname = "Pantoja Giraldo";
        $client->type_dni = "CC";
        $client->dni = "1142157180";
        $client->sex = "F";
        $client->is_active = 0;
        $client->save();
    }
}
