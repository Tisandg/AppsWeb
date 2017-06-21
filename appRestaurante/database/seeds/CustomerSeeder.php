<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
        	\DB::table('customers')->insert(array(
        		'iduser' => str_random(10),
		        'name' => $faker->firstName,
		        'lastname' => $faker->lastName,
		        'docid' => str_random(10),
		        'pin' => str_random(4),
		        'email' => $faker->unique()->safeEmail,
		        'remember_token' => str_random(10),
    		));
        }

    }
}
