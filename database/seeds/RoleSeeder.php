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
        DB::table('admins')->insert([
           'uuid' => \Illuminate\Support\Str::uuid(),
           'name' => 'Isaac Danso Asiedu',
           'password' => \Illuminate\Support\Facades\Hash::make('password'),
           'email' => 'isaac.danso@agrosourcing.net',
            'level' => 1,
            'status' => 1
        ]);
        DB::table('admins')->insert([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'name' => 'Richmond Nutsuglo',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'email' => 'rich.nutsuglo@agrosourcing.net',
            'level' => 1,
            'status' => 1
        ]);
    }
}
