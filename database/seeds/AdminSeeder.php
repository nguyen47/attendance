<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'name' => "Admin",
            "password" => bcrypt("secret"),
            'email' => "admin@gmail.com"
        ]);
    }
}
