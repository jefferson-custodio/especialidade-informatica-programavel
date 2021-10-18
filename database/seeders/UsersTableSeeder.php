<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Jefferson',
            'email'=>'jefferson@sentinelas.com',
            'password'=> Hash::make('123456'),
            'remember_token'=> Str::random(40)
        ]);
    }
}
