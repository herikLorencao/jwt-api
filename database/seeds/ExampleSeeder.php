<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ExampleSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'login' => 'readerTest',
            'email' => 'reader@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
