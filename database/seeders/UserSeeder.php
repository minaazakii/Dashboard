<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email'=>'admin@mail.com'],
            [
            'name'=>'admin',
            'password'=>bcrypt(123456789),
            'phone'=>'123456789',
            'active'=>1
        ]);
    }
}
