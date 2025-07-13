<?php

namespace Database\Seeders;

use App\Models\Marketing;
use App\Models\Sales;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Sales::insert([
            [
                "transaction_number" => "TRX001",
                "marketing_id" => 1,
                "date" => Carbon::parse("2023-05-22")->format('Y-m-d'),
                "cargo_fee" => 25000,
                "total_balance" => 3000000,
                "grand_total" => 3025000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX002",
                "marketing_id" => 3,
                "date" => Carbon::parse("2023-05-22")->format('Y-m-d'),
                "cargo_fee" => 25000,
                "total_balance" => 320000,
                "grand_total" => 345000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX003",
                "marketing_id" => 1,
                "date" => Carbon::parse("2023-05-22")->format('Y-m-d'),
                "cargo_fee" => 0,
                "total_balance" => 65000000,
                "grand_total" => 65000000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX004",
                "marketing_id" => 1,
                "date" => Carbon::parse("2023-05-23")->format('Y-m-d'),
                "cargo_fee" => 10000,
                "total_balance" => 70000000,
                "grand_total" => 70010000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX005",
                "marketing_id" => 2,
                "date" => Carbon::parse("2023-05-23")->format('Y-m-d'),
                "cargo_fee" => 10000,
                "total_balance" => 80000000,
                "grand_total" => 80010000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX006",
                "marketing_id" => 3,
                "date" => Carbon::parse("2023-05-23")->format('Y-m-d'),
                "cargo_fee" => 12000,
                "total_balance" => 44000000,
                "grand_total" => 44012000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX007",
                "marketing_id" => 1,
                "date" => Carbon::parse("2023-06-01")->format('Y-m-d'),
                "cargo_fee" => 0,
                "total_balance" => 75000000,
                "grand_total" => 75000000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX008",
                "marketing_id" => 2,
                "date" => Carbon::parse("2023-06-02")->format('Y-m-d'),
                "cargo_fee" => 0,
                "total_balance" => 85000000,
                "grand_total" => 85000000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX009",
                "marketing_id" => 2,
                "date" => Carbon::parse("2023-06-01")->format('Y-m-d'),
                "cargo_fee" => 0,
                "total_balance" => 175000000,
                "grand_total" => 175000000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX010",
                "marketing_id" => 3,
                "date" => Carbon::parse("2023-06-01")->format('Y-m-d'),
                "cargo_fee" => 0,
                "total_balance" => 75000000,
                "grand_total" => 75000000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX011",
                "marketing_id" => 2,
                "date" => Carbon::parse("2023-06-01")->format('Y-m-d'),
                "cargo_fee" => 0,
                "total_balance" => 750020000,
                "grand_total" => 750020000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "transaction_number" => "TRX012",
                "marketing_id" => 3,
                "date" => Carbon::parse("2023-06-01")->format('Y-m-d'),
                "cargo_fee" => 0,
                "total_balance" => 130000000,
                "grand_total" => 120000000,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
        ]);
    }
}
