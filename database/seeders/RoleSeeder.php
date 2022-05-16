<?php

namespace Database\Seeders;

use App\Helpers\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles
        Role::create(['name' => Roles::SUPER_ADMIN]);
        $lawyer = Role::create(['name' => Roles::LAWYER]);
        $client = Role::create(['name' => Roles::CLIENT]);

        $lawyer->givePermissionTo('create a dossier');
        $lawyer->givePermissionTo('view own dossier');
        $lawyer->givePermissionTo('edit own dossier');
        $lawyer->givePermissionTo('delete own dossier');
        $lawyer->givePermissionTo('create own order de mission');
        $lawyer->givePermissionTo('view own order de mission');
        $lawyer->givePermissionTo('edit own order de mission');

        $client->givePermissionTo('view own dossier');
    }
}
