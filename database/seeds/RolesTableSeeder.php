<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach (
            [1 => 'user', 2 => 'moderator', 3 => 'admin'] as
            $id => $name
        ) {
            Role::where(['id' => $id, 'name' => $name])->firstOrCreate(['id' => $id, 'name' => $name]);
        }
    }
}
