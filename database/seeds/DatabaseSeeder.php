<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BloodSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(GenderSeeder::class);
    }
}
