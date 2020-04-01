<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();

        DB::table('assigned_roles')->truncate();

        $user = User::create([
            'name' => 'Dayana',
            'email' => 'dayana@email.com',
            'password' => '123123'
        ]);

        $role =Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'descripcion' => 'Administrador del sitio web'
        ]);

        $user->roles()->save($role);
    }
}
