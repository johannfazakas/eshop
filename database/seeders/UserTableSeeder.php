<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User([
            'name' => 'johann',
            'email' => 'johann@mail.com',
            'password' => Hash::make('secret123'),
        ]);
        $user->save();

        $user = new \App\Models\User([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('secret123'),
            'is_admin' => true
        ]);
        $user->save();
    }
}
