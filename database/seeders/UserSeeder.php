<?php

namespace Database\Seeders;

use App\Helpers\Roles;
use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            'name'              => 'Administrator',
            'phone'             => '0623242526',
            'email'             => 'admin-advocate-pro@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin1234'),
            'remember_token'    => Str::random(10),
        ]);

        $lawyer = User::create([
            'name'              => 'Lawyer',
            'phone'             => '0623448626',
            'email'             => 'lawyer-advocate-pro@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('lawyer1234'),
            'remember_token'    => Str::random(10),
        ]);

        $client = User::create([
            'name'              => 'Client',
            'phone'             => '0624862526',
            'email'             => 'client-advocate-pro@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('client1234'),
            'remember_token'    => Str::random(10),
        ]);

        $superAdmin->assignRole(Roles::SUPER_ADMIN);
        $lawyer->assignRole(Roles::LAWYER);
        $client->assignRole(Roles::CLIENT);
    }
}
