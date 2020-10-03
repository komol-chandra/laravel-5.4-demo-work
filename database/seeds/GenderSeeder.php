<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
        	'gender_name'=>'Male',
        ]);
        DB::table('genders')->insert([
        	'gender_name'=>'Female',
        ]);
        DB::table('genders')->insert([
        	'gender_name'=>'Other',
        ]);
        
    }
}
