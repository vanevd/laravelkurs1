<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(ClientSeeder::class);
        //$this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(TestSeeder::class);
    }
}
