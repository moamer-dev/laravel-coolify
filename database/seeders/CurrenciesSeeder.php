<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                "name" => "Dollar",
                "code" => "USD",
                "symbol" => "$",
            ],
            [
                "name" => "Euro",
                "code" => "EUR",
                "symbol" => "€",
            ],
            [
                "name" => "Pound",
                "code" => "GBP",
                "symbol" => "£",
            ],
            [
                "name" => "Yen",
                "code" => "JPY",
                "symbol" => "¥",
            ],
            [
                "name" => "Won",
                "code" => "KRW",
                "symbol" => "₩",
            ],
            [
                "name" => "Yuan",
                "code" => "CNY",
                "symbol" => "¥",
            ],
            [
                "name" => "Ruble",
                "code" => "RUB",
                "symbol" => "₽",
            ],
            [
                "name" => "Rupee",
                "code" => "INR",
                "symbol" => "₹",
            ],
            [
                "name" => "Real",
                "code" => "BRL",
                "symbol" => "R$",
            ],

        ];
        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
