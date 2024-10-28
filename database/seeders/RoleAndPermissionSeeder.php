<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Maak de rollen aan
        $ownerRole = Role::create(['name' => 'owner']);
        $sitterRole = Role::create(['name' => 'sitter']);
        $adminRole = Role::create(['name' => 'admin']);

        // Maak de permissies aan
        Permission::create(['name' => 'block users']);
        Permission::create(['name' => 'delete requests']);
        Permission::create(['name' => 'delete reviews']);

        // Ken permissies toe aan rollen
        $adminRole->givePermissionTo(['block users', 'delete requests', 'delete reviews']);
    }
}
