<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 100,
            'name' => 'hairdemo',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('hairdressers')->insert([
            'id' => 100,
            'photo' => null,
            'bio' => str_random(100),
            'user_id' => 100,
        ]);

        DB::table('hairstyles')->insert([
            'id' => 1,
            'name' => str_random(10),
            'price' => 5.00,
            'sex' => '0',
            'hairdresser_id' => 100,
        ]);

        $faker = \Faker\Factory::create();
        foreach (range(1,10) as $index) {
            DB::table('hairstyles')->insert([
                'name' => $faker->name,
                'price' => $faker->numberBetween(0, 100),
                'sex' => '0',
                'hairdresser_id' => 100,
            ]);
        };
    }
}
