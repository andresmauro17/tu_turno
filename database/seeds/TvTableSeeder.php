<?php

use Illuminate\Database\Seeder;
use App\Tv;

class TvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tv = new Tv();
        $tv -> message = 'Mensaje Publicitario MODIFICABLE';
        $tv -> url = 'l-aS0XSmShM';
        $tv -> turn_max = 10;
        $tv -> save();
    }
}
