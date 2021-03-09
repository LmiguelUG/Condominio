<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $admin_permissions = Permission::all();
        $admin->syncPermissions($admin_permissions);

        $user  = Role::create(['name' => 'user']);
        $user_permissions = ['project-list', 'project-create', 'project-edit', 'project-delete'];
        $user->syncPermissions($user_permissions);
    }
}
