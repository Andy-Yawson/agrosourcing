<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'name' => "Oti Region"
        ]);

        DB::table('regions')->insert([
            'name' => "Bono East Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Ahafo Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Bono Region"
        ]);
        DB::table('regions')->insert([
            'name' => "North East Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Savannah Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Western North Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Western Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Volta Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Greater Accra Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Eastern Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Ashanti Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Central Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Northern Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Upper East Region"
        ]);
        DB::table('regions')->insert([
            'name' => "Upper West Region"
        ]);
    }
}
