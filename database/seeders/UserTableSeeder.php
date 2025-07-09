<?php

namespace Database\Seeders;

use App\Models\Detallecargo;
use App\Models\Detallerole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->imagen = "user.jpg";
        $user->email = "marcos@cuanticagroup.com";
        $user->password = Hash::make("123");
        $user->confirmpassword = Hash::make("123");
        $user->name = "administrador_cuantica";
        $user->slug = "administrador_cuantica";
        $user->estado = "Activo";
        $user->tipo_usuario = "Administrador Supremo";
        $user->save();
        
        // $dtlle_cargo = new Detallecargo();
        // $dtlle_cargo->name = "Administrador Supremo";
        // $dtlle_cargo->cargo_id = 1;
        // $dtlle_cargo->user_id = $user->id;
        // $dtlle_cargo->save();

        $user = new User();
        $user->imagen = "user.jpg";
        $user->email = "administrador_general@ttis.com";
        $user->password = Hash::make("12345678");
        $user->confirmpassword = Hash::make("12345678");
        $user->name = "administrador_general";
        $user->slug = "administrador_general";
        $user->estado = "Activo";
        $user->tipo_usuario = "Administrador General";
        $user->save();

        // $dtlle_cargo = new Detallecargo();
        // $dtlle_cargo->name = "Administrador General";
        // $dtlle_cargo->cargo_id = 1;
        // $dtlle_cargo->user_id = $user->id;
        // $dtlle_cargo->save();

    }
}
