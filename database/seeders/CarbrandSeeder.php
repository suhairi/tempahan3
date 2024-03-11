<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarbrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = array(
            array('name' => 'PROTON'),
            array('name' => 'R MAXUS'),
            array('name' => 'NISSAN'),
            array('name' => 'TOYOTA'),
            array('name' => 'HICOM'),
            array('name' => 'HONDA'),
            array('name' => 'DAIHATSU'),
        );
        DB::table('carbrands')->insert($brands);
    }
}
