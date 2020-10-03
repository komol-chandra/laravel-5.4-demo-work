<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
        	'department_name'=>'computer Science',
        ]);
        DB::table('departments')->insert([
        	'department_name'=>'Data Telecommunication',
        ]);
        DB::table('departments')->insert([
        	'department_name'=>'Telecommunication',
        ]);
    }
}
