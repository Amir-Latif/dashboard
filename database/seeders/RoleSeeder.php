<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => "admin",
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'role' => "author",
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'role' => "editor",
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'role' => "maintainer",
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'role' => "subscriber",
            'created_at' => now(),
        ]);
    }
}
