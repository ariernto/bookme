<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ExtraRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Activity
        Permission::findOrCreate('activity_view');
        Permission::findOrCreate('activity_create');
        Permission::findOrCreate('activity_update');
        Permission::findOrCreate('activity_delete');
        Permission::findOrCreate('activity_manage_others');
        Permission::findOrCreate('activity_manage_attributes');

        // Accommodation
        Permission::findOrCreate('accommodation_view');
        Permission::findOrCreate('accommodation_create');
        Permission::findOrCreate('accommodation_update');
        Permission::findOrCreate('accommodation_delete');
        Permission::findOrCreate('accommodation_manage_others');
        Permission::findOrCreate('accommodation_manage_attributes');

        // Sauna
        Permission::findOrCreate('sauna_view');
        Permission::findOrCreate('sauna_create');
        Permission::findOrCreate('sauna_update');
        Permission::findOrCreate('sauna_delete');
        Permission::findOrCreate('sauna_manage_others');
        Permission::findOrCreate('sauna_manage_attributes');

        // Boat
        Permission::findOrCreate('boat_view');
        Permission::findOrCreate('boat_create');
        Permission::findOrCreate('boat_update');
        Permission::findOrCreate('boat_delete');
        Permission::findOrCreate('boat_manage_others');
        Permission::findOrCreate('boat_manage_attributes');

        // this can be done as separate statements
        $this->initVendor();

        $role = Role::findOrCreate('administrator');

        $role->givePermissionTo(Permission::all());
    }

    public function initVendor(){

        $vendor = Role::findOrCreate('vendor');

        // $vendor->givePermissionTo('activity_view');
        // $vendor->givePermissionTo('activity_create');
        // $vendor->givePermissionTo('activity_update');
        // $vendor->givePermissionTo('activity_delete');

        // $vendor->givePermissionTo('accommodation_view');
        // $vendor->givePermissionTo('accommodation_create');
        // $vendor->givePermissionTo('accommodation_update');
        // $vendor->givePermissionTo('accommodation_delete');

        // $vendor->givePermissionTo('boat_view');
        // $vendor->givePermissionTo('boat_create');
        // $vendor->givePermissionTo('boat_update');
        // $vendor->givePermissionTo('boat_delete');

        // $vendor->givePermissionTo('sauna_view');
        // $vendor->givePermissionTo('sauna_create');
        // $vendor->givePermissionTo('sauna_update');
        // $vendor->givePermissionTo('sauna_delete');
    }
}
