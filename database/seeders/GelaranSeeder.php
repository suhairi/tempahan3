<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GelaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gelarans = array(
            array("id" => 1, "name" => "Pengarah"),
            array("id" => 2, "name" => "Setiausaha Pengarah"),
            array("id" => 3, "name" => "Pengerusi"),
            array("id" => 4, "name" => "Setiausaha Pengerusi"),
            array("id" => 5, "name" => "Pengurus Besar"),
            array("id" => 6, "name" => "Setiausaha Pengurus Besar"),
            array("id" => 7, "name" => "Timb. Pengurus Besar Pertanian"),
            array("id" => 8, "name" => "Setiausaha Tim b. Pengurus Besar Pertanian"),
            array("id" => 9, "name" => "Timb. Pengurus Besar Teknikal"),
            array("id" => 10, "name" => "Setiausaha Timb. Pengurus Besar Teknikal"),
        );
        DB::table('gelarans')->insert($gelarans);
    }
}
