<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = array(
            array('name' => 'SEDAN'),
            array('name' => 'SUV'),
            array('name' => '4WD'),
            array('name' => 'PICKUP'),
            array('name' => 'VAN'),
            array('name' => 'LORI'),
        );
        DB::table('cartypes')->insert($types);
    }
}
