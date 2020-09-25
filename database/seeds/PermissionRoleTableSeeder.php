<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        // Persmisos agregados manualmente
        $role = Role::where('name', 'specialist')->firstOrFail();
        \DB::table('permission_role')->insert(
            array (
                0 =>
                array (
                    'permission_id' => 1,
                    'role_id' => $role->id,
                )
            )
        );

        // Appointments
        $permissions = Permission::where('table_name', 'appointments')->get();
        $role->permissions()->attach(
            $permissions->pluck('id')->all()
        );
    }
}
