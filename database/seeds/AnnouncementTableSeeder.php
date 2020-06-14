<?php

use ConvAux\Announcement;
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

        // Convocatorias
        $convocatoria = new Announcement();
        $convocatoria->name = 'Primera Convocatoria';
        $convocatoria->title = 'Convocatoria de prueba';
        $convocatoria->description = 'Esta convocatoria es de prueba, asi que es la primera';
        $convocatoria->management_id = 1;
        $convocatoria->announcement_type_id = 1;
        $convocatoria->status = 'CREADO';
        $convocatoria->save();

        $convocatoria = new Announcement();
        $convocatoria->name = 'Convocatoria a docencia 2020';
        $convocatoria->title = 'CONVOCATORIA A CONCURSO DE MÉRITOS Y PRUEBAS DE CONOCIMIENTOS PARA OPTAR A AUXILIATURAS DE DOCENCIA';
        $convocatoria->description = 'El Departamento de Informática y Sistemas junto a las Carreras de Ing. Informática e Ing. De Sistemas de la Facultad de Ciencias y Tecnología, convoca al concurso de méritos y examen de competencia para la provisión de Auxiliares del Departamento,tomando como base los requerimientos que se tienen programados para la gestión 2020.';
        $convocatoria->management_id = 1;
        $convocatoria->announcement_type_id = 1;
        $convocatoria->status = 'CREADO';
        $convocatoria->save();

        $convocatoria = new Announcement();
        $convocatoria->name = 'Convocatoria a laboratorio 2020';
        $convocatoria->title = 'CONVOCATORIA A CONCURSO DE MÉRITOS Y PRUEBAS DE CONOCIMIENTOS PARA OPTAR A AUXILIATURAS EN LABORATORIO DE COMPUTACIÓN, DE MANTENIMIENTO Y DESARROLLO';
        $convocatoria->description = 'El Departamento de Informática y Sistemas junto a las Carreras de Ing. Informática e Ing. de Sistemas, de la Facultad de Ciencias y Tecnología, convoca al concurso de méritos y examen de competencia para la provisión de Auxiliares del Departamento, tomando como base los requerimientos que se tienen programados para la gestión 2020.';
        $convocatoria->management_id = 1;
        $convocatoria->announcement_type_id = 2;
        $convocatoria->status = 'CREADO';
        $convocatoria->save();
    }
}
