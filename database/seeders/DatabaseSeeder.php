<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(CargoTableSeeder::class);
        $this->call(DocumentoTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TipoTableSeeder::class);
        $this->call(MedidaTableSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
