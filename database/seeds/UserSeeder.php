<?php


use App\JwtUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        JwtUser::create([
            'login' => 'usertest',
            'password' => Hash::make('123456')
        ]);
    }
}
