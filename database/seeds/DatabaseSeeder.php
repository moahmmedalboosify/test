<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call(users::class);
        $this->call(state_invoice::class);
        $this->call(section::class);
        $this->call(products::class);
    }
}
