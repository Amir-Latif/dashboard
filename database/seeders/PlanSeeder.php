<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'plan' => "basic",
            'created_at' => now(),
        ]);
        DB::table('plans')->insert([
            'plan' => "company",
            'created_at' => now(),
        ]);
        DB::table('plans')->insert([
            'plan' => "enterprise",
            'created_at' => now(),
        ]);
        DB::table('plans')->insert([
            'plan' => "team",
            'created_at' => now(),
        ]);
    }
}
