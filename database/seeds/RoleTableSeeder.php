<?php

use Illuminate\Database\Seeder;
use ConvAux\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "SuAdmin";
        $role->description = "Administrador de los administradores";
        $role->save();

        $role = new Role();
        $role->name = "Admin";
        $role->description = "Administrador";
        $role->save();

        $role = new Role();
        $role->name = "Admin_comision_revision";
        $role->description = "Administrador de comision revision";
        $role->save();

        $role = new Role();
        $role->name = "Admin_comision_calificacion";
        $role->description = "Administrador de comision que se encarga de la calificacion";
        $role->save();

        $role = new Role();
        $role->name = "Admin_Revisor";
        $role->description = "Administrador que se encarga de la revision de folder";
        $role->save();

        $role = new Role();
        $role->name = "User_estudiante";
        $role->description = "Usuario";
        $role->save();

        $role = new Role();
        $role->name = "User_secretary";
        $role->description = "Usuario secretaria que se encarga de generar el codigo de posutulacion de cada estudiante";
        $role->save();
    }
}
