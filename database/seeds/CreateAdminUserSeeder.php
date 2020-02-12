<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // find first user
        $user = User::find(1);

        if (empty($user)) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin')
            ]);
        }

        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    } 
}
