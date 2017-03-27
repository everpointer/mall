<?php

/**
 * Antvel - Seeder
 * Users Table.
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */
use Faker\Factory as Faker;
use Notadd\Shop\Models\Person;
use Illuminate\Database\Seeder;
use Notadd\Shop\Models\Business;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        // create some users for every role
        for ($i = 0; $i < 10; $i++) {
            //persons
            Person::create([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'birthday'   => $faker->dateTimeBetween('-40 years', '-16 years'),
                'sex'        => $faker->randomElement(['male', 'female']),
                'home_phone' => $faker->e164PhoneNumber,
                'user'       => [
                    'name'      => $faker->userName,
                    'nick_name' => $faker->userName,
                    'email'     => $faker->unique()->email,
                    'password'  => Hash::make('123456'),
                ],
            ]);
        }
        for ($i = 0; $i < 8; $i++) {
            $company_name = $faker->company;
            //business
            Business::create([
                'business_name' => $company_name,
                'creation_date' => $faker->date(),
                'local_phone'   => $faker->e164PhoneNumber,
                'user'          => [
                    'name'      => $faker->userName,
                    'nick_name' => $faker->userName,
                    'email'     => $faker->unique()->email,
                    'password'  => Hash::make('123456'),
                ],
            ]);
        }
    }
}
