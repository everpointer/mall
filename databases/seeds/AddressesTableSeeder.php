<?php

/**
 * Antvel - Seeder
 * Addresses Table.
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */
use Faker\Factory as Faker;
use Notadd\Shop\Models\Address;
use Illuminate\Database\Seeder;
use Notadd\Member\Models\Member;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        // Category
        for ($i = 0; $i < 3; $i++) {
            // $user = Member::select(['id'])->where('id', 1)->first();
            $address = Address::create([
                // 'user_id'      => ($i <= 2) ? 4 : $user->id,
                'user_id'      => 1,
                'default'      => 0,
                'line1'        => $faker->streetAddress,
                'line2'        => $faker->streetAddress,
                'phone'        => $faker->e164PhoneNumber,
                'name_contact' => $faker->streetName,
                'zipcode'      => $faker->postcode,
                'city'         => $faker->city,
                'country'      => $faker->country,
                'state'        => $faker->state,
            ]);
        }
    }
}
