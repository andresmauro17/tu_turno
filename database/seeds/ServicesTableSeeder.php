<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new Service();
        $service->name = "Vacunacion";
        $service->description = "Para generar un turno de vacunacion";
        $service->short_name = "VC";
        $service->is_active = 0;
        $service->save();


        $service = new Service();
        $service->name = "Consulta Pediatria";
        $service->description = "Para generar un turno de pediatria";
        $service->short_name = "CP";
        $service->is_active = 1;
        $service->save();
    }
}
