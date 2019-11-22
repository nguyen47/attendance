<?php

use Illuminate\Database\Seeder;
use App\Student;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $students = Student::all()->pluck('id');
        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('attendances')->insert([
                'id' => $faker->uuid,
                'student_id' => $faker->randomElement($students),
                'check_in' => $faker->dateTimeBetween(
                    $startDate = '-1 day',
                    $endDate = 'now',
                    $timezone = null
                ),
                'check_out' => $faker->dateTimeBetween(
                    $startDate = '-1 day',
                    $endDate = 'now'
                ),

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
