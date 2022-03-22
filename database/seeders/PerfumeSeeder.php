<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerfumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( "perfume")->insert([
            "name" => "Boss",
            "type" => "férfi",
            "price" => "250000",

        ],[
            "name" => "Avon",
            "type" => "noi",
            "price" => "15000",
        ],
        [
            "name" => "Zara",
            "type" => "férfi",
            "price" => "300000",

        ],
        [
            "name" => "Nike",
            "type" => "noi",
            "price" => "8900",

        ],
        [
            "name" => "Adidas",
            "type" => "noi",
            "price" => "12000",

        ],
    );
    }
}
