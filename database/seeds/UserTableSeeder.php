<?php

use Illuminate\Database\Seeder;
use ConvAux\User;
use ConvAux\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_suadmin = Role::where('name','suadmin')->first();
        $role_admin = Role::where('name','admin')->first();
        $role_comision_revision = Role::where('name','admin_comision_revision')->first();
        $role_comision_calificacion = Role::where('name','admin_comision_calificacion')->first();
        $role_revision = Role::where('name','admin_Revisor')->first();
        $role_user_estudiante = Role::where('name','user_estudiante')->first();
        $role_secretary = Role::where('name', 'User_secretary')->first();

        $user = new User();
        $user->name = "Super-Admin";
        $user->last_name = "";
        $user->ci = "0000000";
        $user->expedido = 2;
        $user->cod_sis = 200000000;
        $user->carrera = "2";
        $user->email = "su-admin@mail.com";
        $user->password = bcrypt('mundolibre');
        $user->save();
        $user->roles()->attach($role_suadmin);

        $user = new User();
        $user->name = "Carlos";
        $user->last_name = "Perez";
        $user->ci = "0000001";
        $user->expedido = 2;
        $user->cod_sis = 200000001;
        $user->carrera = "2";
        $user->email = "user@mail.com";
        $user->password = bcrypt('mundolibre');
        $user->save();
        $user->roles()->attach($role_user_estudiante);

        $user = new User();
        $user->name = "Pedro";
        $user->last_name = "Ramirez";
        $user->ci = "0000002";
        $user->expedido = 2;
        $user->cod_sis = 200000002;
        $user->carrera = "2";
        $user->email = "admin@mail.com";
        $user->password = bcrypt('mundolibre');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = "Maria";
        $user->last_name = "Martinez";
        $user->ci = "0000003";
        $user->expedido = 2;
        $user->cod_sis = 200000003;
        $user->carrera = "2";
        $user->email = "secretaria@mail.com";
        $user->password = bcrypt('secretaria');
        $user->save();
        $user->roles()->attach($role_secretary);

        $user = new User();
        $user->name = "Jose";
        $user->last_name = "Renato";
        $user->ci = "0000004";
        $user->expedido = 2;
        $user->cod_sis = 200000004;
        $user->carrera = "2";
        $user->email = "admin_revi@mail.com";
        $user->password = bcrypt('revisor');
        $user->save();
        $user->roles()->attach($role_comision_revision);

        $user = new User();
        $user->name = "Humberto";
        $user->last_name = "Grageda";
        $user->ci = "0000005";
        $user->expedido = 2;
        $user->cod_sis = 200000005;
        $user->carrera = "2";
        $user->email = "admin_cali@mail.com";
        $user->password = bcrypt('Calificador');
        $user->save();
        $user->roles()->attach($role_comision_calificacion);
    }
}
