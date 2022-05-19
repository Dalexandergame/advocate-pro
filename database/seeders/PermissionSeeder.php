<?php

namespace Database\Seeders;

use App\Helpers\Sections;
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
        foreach (Sections::SECTIONS as $item){
            Permission::create(['name' => 'view all '.$item.'s']);
            Permission::create(['name' => 'view '.$item]);
            Permission::create(['name' => 'edit '.$item]);
            Permission::create(['name' => 'delete '.$item]);
        }

        Permission::create(['name' => 'view Dashboard']);

    }
}
