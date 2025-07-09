<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        $role->name = "Administrador";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->nivel = "PRINCIPAL";
        $role->save();

        $role = new Role();
        $role->name = "Supervisor";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->nivel = "SECUNDARIO";
        $role->save();

        $role = new Role();
        $role->name = "Auxiliar";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->nivel = "SECUNDARIO";
        $role->save();
        
        $role = new Role();
        $role->name = "Operarios";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->nivel = "SECUNDARIO";
        $role->save();
        
    }
}
