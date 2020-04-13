<?php

use Illuminate\Database\Seeder;
use App\Diligence;

class DiligencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diligence = new Diligence();
        $diligence->name = "Informacion Vacunacion";
        $diligence->save();

        $diligence = new Diligence();
        $diligence->name = "Facturacion";
        $diligence->save();

        $diligence = new Diligence();
        $diligence->name = "Aplicacion Vacunacion";
        $diligence->save();

        $diligence = new Diligence();
        $diligence->name = "Atencion Consulta";
        $diligence->save();

    }
}
