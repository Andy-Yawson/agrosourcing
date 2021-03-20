<?php

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
            'name' => "Farmer"
        ]);
        DB::table('roles')->insert([
            'name' => "Processing Company"
        ]);
        DB::table('roles')->insert([
            'name' => "Aggregator"
        ]);
        DB::table('roles')->insert([
            'name' => "Trucker"
        ]);
    }
}
