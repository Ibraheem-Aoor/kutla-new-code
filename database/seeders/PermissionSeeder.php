<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
        /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesStructure = [
            'Super Admin' => [
                'dashboard' => 'r',
                'users' => 'r,c,u,d',

                // settings
                'settings' => 'r,u',
                'roles' => 'r,c,u,d',
                'permissions' => 'r,c',
                'notifications' => 'r,u',
                'currencies' => 'r,c,u,d',
                'categories' => 'r,c,u,d',
                'sub-categories' => 'r,c,u,d',
                'specialities' => 'r,c,u,d',
                'news' => 'r,c,u,d',
                'photos' => 'r,c,u,d',
                'videos' => 'r,c,u,d',
                'blog-categories' => 'r,c,u,d',
                'blog-sub-categories' => 'r,c,u,d',
                'blogs' => 'r,c,u,d',
                'repoters' => 'r,c,u,d',
                'contact' => 'r,c,u,d',
                'manage-pages' => 'r,u',
                'login-pages' => 'r,u',
                'ads' => 'r,c,u,d',
                'seo' => 'r,c,u,d',
                'socials' => 'r,c,u,d',
                'headers' => 'r,c,u,d',
                'footers' => 'r,c,u,d',
                'site-settings' => 'r,c,u,d',
                'company-settings' => 'r,c,u,d',
                'theme-settings' => 'r,c,u,d',

            ],

            'Admin' => [
                'dashboard' => 'r',
                'users' => 'r,c,u,d',

                // settings
                'settings' => 'r,u',
                'notifications' => 'r,u',

            ],

            'Editor' => [
                'dashboard' => 'r',

                // settings
                'notifications' => 'r,u',

            ],

            'Reporter' => [
                'dashboard' => 'r',

                // settings
                'notifications' => 'r,u',

            ],
        ];

        foreach ($rolesStructure as $key => $modules) {
            // Create a new role
            $role = Role::firstOrCreate([
                'name' => str($key)->remove(' ')->lower(),
                'guard_name' => 'web'
            ]);
            $permissions = [];

            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $perm) {

                    $permissionValue = $this->permissionMap()->get($perm);

                    $permissions[] = Permission::firstOrCreate([
                        'name' => $module . '-' . $permissionValue,
                        'guard_name' => 'web'
                    ])->id;

                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);

            $this->command->info("Creating '{$key}' user");
            // Create default user for each role
            $user = User::create([
                'role' => str($key)->remove(' ')->lower(),
                'name' => ucwords(str_replace('_', ' ', $key)),
                'password' => bcrypt(str($key)->remove(' ')->lower()),
                'email' => str($key)->remove(' ')->lower().'@'.str($key)->remove(' ')->lower().'.com',
                'email_verified_at' => now(),
            ]);

            $user->assignRole($role);
        }
    }

    private function permissionMap() {
        return collect([
            'c' => 'create',
            'r' => 'read',
            'u' => 'update',
            'd' => 'delete',
        ]);
    }
}
