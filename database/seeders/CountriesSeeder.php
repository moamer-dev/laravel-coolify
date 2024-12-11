<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                "name" => "Egypt",
                "code" => "EG",
            ],
            [
                "name" => "United States",
                "code" => "US",
            ],
            [
                "name" => "United Kingdom",
                "code" => "UK",
            ],
            [
                "name" => "France",
                "code" => "FR",
            ],
            [
                "name" => "Germany",
                "code" => "DE",
            ],
            [
                "name" => "Italy",
                "code" => "IT",
            ],
            [
                "name" => "Spain",
                "code" => "ES",
            ],
            [
                "name" => "China",
                "code" => "CN",
            ],
            [
                "name" => "Japan",
                "code" => "JP",
            ],
            [
                "name" => "South Korea",
                "code" => "KR",
            ],

        ];
        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
