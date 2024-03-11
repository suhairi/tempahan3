<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = array(
            array("id" => "1", "name" => "Aktif / Bekerja"),
            array("id" => "2", "name" => "Bersara"),
            array("id" => "3", "name" => "Berhenti"),
            array("id" => "6", "name" => "Meninggal Dunia"),
            array("id" => "4", "name" => "Aktif / Kurang Upaya"),
            array("id" => "5", "name" => "Aktif / Tidak Hadir Bekerja"),
            array("id" => "7", "name" => "Dibuang"),
            array("id" => "8", "name" => "Meletak Jawatan")
        );
        DB::table('statuses')->insert($statuses);
    }
}
