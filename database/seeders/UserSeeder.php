<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@zigexn.vn'],
            [
                'name' => 'Name admin',
                'role_id' => User::ADMIN,
                'password' => bcrypt('123456')
            ]
        );
    }
}
