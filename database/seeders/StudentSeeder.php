<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')
        ->insert([
            "name"   => "Md Alamin Hossain",
            "course" => "PHP",
            "fee"    => "1000",
        ]);
        
    }
}
