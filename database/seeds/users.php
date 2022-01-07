<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

      User::create([
            'name' => 'mohammed',
            'email' => 'mohammed@test',
            'password' => bcrypt('123456')
           ]);

   
    }
}
