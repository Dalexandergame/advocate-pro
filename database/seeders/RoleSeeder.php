<?php

namespace Database\Seeders;

use App\Helpers\Roles;
use App\Helpers\Sections;
use Illuminate\Database\Seeder;
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

        foreach (Sections::SECTIONS as $item){
            $lawyer->givePermissionTo('view '.$item);
            $lawyer->givePermissionTo('edit '.$item);
            $lawyer->givePermissionTo('delete '.$item);
        }

        foreach (Sections::CLIENT_SECTIONS as $item){
            $client->givePermissionTo('view '.$item);
        }
    }
}
