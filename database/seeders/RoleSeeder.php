<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("roles")->insert([
            
            [
                "name" => "Chief Examination Officer",
                "created_at" => now(),
                "updated_at" => now()
            ],
           [
               "name" => "IT",
               "created_at" => now(),
               "updated_at" => now()
           ],
           [
               "name" => "Senior Training and examinations",
               "created_at" => now(),
               "updated_at" => now()
           ],
           [
                "name" => "Administrator",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ]);
    }
}
