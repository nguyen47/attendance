<?php

use Illuminate\Database\Seeder;
use App\Major;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $majors = Major::all()->pluck('id');
        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('students')->insert([
                'id' => $faker->uuid,
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'fin' =>
                    'G ' .
                    $faker->randomNumber($nbDigits = null, $strict = false),
                'password' => bcrypt('secret'),
                'major_id' => $faker->randomElement($majors),
                'created_at' => $faker->dateTimeBetween(
                    $startDate = '-1 months',
                    $endDate = 'now',
                    $timezone = null
                ),
                'updated_at' => $faker->dateTimeBetween(
                    $startDate = '-1 months',
                    $endDate = 'now',
                    $timezone = null
                )
            ]);
        }
    }
}
