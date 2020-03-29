<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = new Module();
        $module->name = "Modulo 1";
        $module->description = "Modulo variable";
        $module->is_active = 1;
        $module->save();

        $module = new Module();
        $module->name = "Modulo 2";
        $module->description = "Modulo variable";
        $module->is_active = 1;
        $module->save();

        $module = new Module();
        $module->name = "Modulo 3";
        $module->description = "Modulo Facturacion";
        $module->is_active = 0;
        $module->save();
    }
}
