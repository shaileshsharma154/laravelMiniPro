<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
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
        
        /*
       // for a single record
        $customer = new customer;
        $customer->name="ShaileshSharma";
        $customer->email="sms@gmail.com";
        $customer->gender="M";
        $customer->address="Mumbai";
        $customer->country="India";
        $customer->state="Maha";
        $customer->city="Greater Mumbai";
        $customer->dob=now();
        $customer->password="123456";
        $customer->save();
    }
    */
    /// for multiple record
    $faker= Faker::create();
    for($i=0; $i<=100; $i++){
        $customer = new customer;
        $customer->name=$faker->name;
        $customer->email=  $faker->email;
        $customer->gender="M";
        $customer->address= $faker->address;
        $customer->country= $faker->country;
        $customer->state=$faker->state;
        $customer->city= $faker->city;
        $customer->dob=now();
        $customer->password=$faker->password;
        $customer->save();

    }
}
}
