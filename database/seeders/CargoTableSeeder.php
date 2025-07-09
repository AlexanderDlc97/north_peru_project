<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Cargo();
        $role->name = "Supervisor General";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "2";
        $role->save();

        $role = new Cargo();
        $role->name = "Supervisor de Planeamiento";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "2";
        $role->save();

        $role = new Cargo();
        $role->name = "Supervisor de Seguridad";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "2";
        $role->save();
        
        $role = new Cargo();
        $role->name = "Supervisor de Campo";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "2";
        $role->save();

        $role = new Cargo();
        $role->name = "Tecnico Planer";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "3";
        $role->save();

        $role = new Cargo();
        $role->name = "Logistica";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "3";
        $role->save();

        $role = new Cargo();
        $role->name = "Albañil";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Almacen";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Carpintero";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Electricista";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Electromecanico";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Electronico";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Gasfitero";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Mecanico";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Pintor";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Sistema de Agua";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();

        $role = new Cargo();
        $role->name = "Soldador";
        $role->slug = Str::slug($role->name);
        $role->estado = "Activo";
        $role->role_id = "4";
        $role->save();
        
    }
}
