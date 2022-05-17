<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'create a dossier']);
        Permission::create(['name' => 'view own dossier']);
        Permission::create(['name' => 'view all dossiers']);
        Permission::create(['name' => 'edit own dossier']);
        Permission::create(['name' => 'delete own dossier']);
        Permission::create(['name' => 'create own order de mission']);
        Permission::create(['name' => 'view own order de mission']);
        Permission::create(['name' => 'view all orderes des missions']);
        Permission::create(['name' => 'edit own order de mission']);
        Permission::create(['name' => 'delete own order de mission']);
        Permission::create(['name' => 'handle orderes des missions']);
        Permission::create(['name' => 'assign tasks']);
        Permission::create(['name' => 'access inventory']);
        Permission::create(['name' => 'give access']);

    }
}
