<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAssignmentSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create permissions if needed (optional)
        $createPostPermission = Permission::firstOrCreate(['name' => 'create posts']);
        $editPostPermission = Permission::firstOrCreate(['name' => 'edit posts']);

        // Assign permissions to roles (optional)
        $adminRole->givePermissionTo([$createPostPermission, $editPostPermission]);
        $userRole->givePermissionTo($createPostPermission);

        // Assign roles to specific users
        $adminUser = User::firstOrCreate([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('kunyayan2025'), // Use a secure password in production
        ]);

        $regularUser = User::firstOrCreate([
            'name' => 'Regular User',
            'email' => 'regular@gmail.com',
            'password' => bcrypt('kunyayan2025'), // Use a secure password in production
        ]);

        // Assign roles to users
        $adminUser->assignRole($adminRole);
        $regularUser->assignRole($userRole);

        $this->command->info('Roles and permissions seeded successfully!');
    }
}
