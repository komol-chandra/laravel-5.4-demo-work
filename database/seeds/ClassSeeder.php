<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_names')->insert([
        	'class_name' => '1st Semester',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => '2nd Semester',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => '3rd Semester',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => '4th Semester',
        ]);
        DB::table('class_names')->insert([
        	'class_name' => '5th Semester',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => '6th Semester',
        ]);
        DB::table('class_names')->insert([
        	'class_name' => '7th Semester',
        ]);

        DB::table('class_names')->insert([
        	'class_name' => '8th Semester',
        ]);
    }
}
