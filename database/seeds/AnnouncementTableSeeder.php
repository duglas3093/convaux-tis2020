<?php

use ConvAux\ConvocatoriaTipo;
use Illuminate\Database\Seeder;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $convocatoriaADocencia = new ConvocatoriaTipo();
        $convocatoriaADocencia->name = "Auxiliaturas para docencia";
        $convocatoriaADocencia->description = "Este tipo de convocatoria es para auxiliares a pizzarra.";
        $convocatoriaADocencia->save();

        $convocatoriaALaboratorio = new ConvocatoriaTipo();
        $convocatoriaALaboratorio->name = "Auxiliaturas en laboratorio";
        $convocatoriaALaboratorio->description = "Este tipo de convocatoria es para auxiliares de laboratorio, de cómputo.";
        $convocatoriaALaboratorio->save();
    }
}
