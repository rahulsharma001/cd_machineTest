<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create course']);
        Permission::create(['name' => 'delete course']);
        Permission::create(['name' => 'edit course']);

        Permission::create(['name' => 'create instructor']);
        Permission::create(['name' => 'delete instructor']);
        Permission::create(['name' => 'edit instructor']);

        Permission::create(['name' => 'create lecture']);
        Permission::create(['name' => 'delete lecture']);
        Permission::create(['name' => 'edit lecture']);

        // create roles and assign created permissions

        $role1 = Role::create(['name' => 'super-admin']);
        $role1->givePermissionTo(Permission::all());

        $role2 = Role::create(['name' => 'instructor']);


        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole($role1);

        $user = User::create([
            'name' => 'instructor',
            'email' => 'ins@ins.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole($role2);
    }
}
