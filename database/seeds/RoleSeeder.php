<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['name' => 'admin', 'display_name' => 'Admin'];
        App\Role::create($role);
    }
}
