<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('majors')->insert([
            'id' => 'ef8576ee-0d2c-11ea-8d71-362b9e155667',
            'name' => 'Certificate In Foundation Skills',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => '985e2a48-0d2f-11ea-8d71-362b9e155667',
            'name' => 'Certificate In Proficiency English',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => '9e5ebb56-0d2f-11ea-8d71-362b9e155667',
            'name' =>
                'NCC Education Level 3 International Foundation Diploma For Higher Education Studies (RQF)',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'a4ad9d60-0d2f-11ea-8d71-362b9e155667',
            'name' => 'Diploma In Esports And Game Design',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'aa95059c-0d2f-11ea-8d71-362b9e155667',
            'name' => 'Diploma In Information Technology',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'b00eacf8-0d2f-11ea-8d71-362b9e155667',
            'name' => 'Diploma In Network And Computer Technology',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'bb29eddc-0d2f-11ea-8d71-362b9e155667',
            'name' =>
                'International Diploma In Gaming And Animation Technology',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => '049c9c58-0d30-11ea-8d71-362b9e155667',
            'name' =>
                'NCC Education Level 4 International Foundation Diploma For Higher Education Studies (RQF)',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'c1ce7716-0d2f-11ea-8d71-362b9e155667',
            'name' => 'NCC Education Level 4 Diploma In Computing (RQF)',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'c7107f12-0d2f-11ea-8d71-362b9e155667',
            'name' => 'Advanced Diploma In Esports And Game Design',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'cc421748-0d2f-11ea-8d71-362b9e155667',
            'name' => 'Advanced Diploma In Information Technology',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'd11399ea-0d2f-11ea-8d71-362b9e155667',
            'name' => 'Advanced Diploma In Network And Computer Technology',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'd5ee096e-0d2f-11ea-8d71-362b9e155667',
            'name' => 'International Advanced Diploma In Gaming And Animation',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'da7a6e96-0d2f-11ea-8d71-362b9e155667',
            'name' =>
                'NCC Education Level 5 International Foundation Diploma For Higher Education Studies (RQF)',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'dfb5101e-0d2f-11ea-8d71-362b9e155667',
            'name' => 'NCC Education Level 5 Diploma In Computing (RQF)',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'e5bfe164-0d2f-11ea-8d71-362b9e155667',
            'name' =>
                'Bachelor Of Science (Honours) In Computer Science (Top Up)',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'ea745e42-0d2f-11ea-8d71-362b9e155667',
            'name' =>
                'Bachelor Of Science (Honours) In Computer Games And Animation',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
        DB::table('majors')->insert([
            'id' => 'efc2adc2-0d2f-11ea-8d71-362b9e155667',
            'name' =>
                'Bachelor Of Science (Honours) In Network Computing (Top Up)',
            'description' =>
                'Duis ullamco officia elit aliqua aliquip. Commodo aute veniam commodo dolor Lorem officia irure nisi incididunt ad exercitation cillum eu. Adipisicing aliquip quis magna fugiat.',
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
