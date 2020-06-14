<?php

use Carbon\Carbon;
use ConvAux\Gestion;
use Faker\Provider\DateTime;
use Illuminate\Database\Seeder;

class ManagementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gestion = new Gestion();
        $gestion->name = "2020";
        $gestion->start_date = Carbon::create(2019, 2, 25);
        $gestion->end_date = Carbon::create(2019, 12, 10);;
        $gestion->description = "Es una gestion para el año entero de 2020.";
        $gestion->save();

        $gestion = new Gestion();
        $gestion->name = "I-2020";
        $gestion->start_date = Carbon::create(2020, 02, 25);
        $gestion->end_date = Carbon::create(2020, 06, 30);;
        $gestion->description = "Gestion para el primer semestre del año.";
        $gestion->save();

        $gestion = new Gestion();
        $gestion->name = "II-2020";
        $gestion->start_date = Carbon::create(2020, 07, 15);
        $gestion->end_date = Carbon::create(2020, 12, 10);;
        $gestion->description = "Gestion para el segundo semestre del año.";
        $gestion->save();

        $gestion = new Gestion();
        $gestion->name = "2021";
        $gestion->start_date = Carbon::create(2021, 02, 25);
        $gestion->end_date = Carbon::create(2021, 12, 10);
        $gestion->description = "Es una gestion para un año entero del 2021";
        $gestion->save();
    }
}
