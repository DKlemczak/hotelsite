<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert([
            'city' => Str::random(10),
            'postcode' => Str::random(10),
            'post' => Str::random(10),
            'street' => Str::random(10),
            'building_number' => 0,
            'reception_number' => Str::random(10),
            'customer_service_number' => Str::random(10),
            'email' => Str::random(10),
        ]);
    }
}
