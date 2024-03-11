<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = array(
            array("id" => "1","plateno" => "KY5000","location" => "HQ","driver_id" => "2"),
            array("id" => "2","plateno" => "KBD96","location" => "HQ","driver_id" => "3"),
            array("id" => "3","plateno" => "KEM7007","location" => "HQ","driver_id" => "4"),
            array("id" => "4","plateno" => "KEC616","location" => "HQ","driver_id" => "5"),
            array("id" => "5","plateno" => "KEE6398","location" => "HQ","driver_id" => "6"),
            array("id" => "6","plateno" => "KEE6598","location" => "HQ","driver_id" => "7"),
            array("id" => "7","plateno" => "KEL6000","location" => "HQ","driver_id" => "8"),
            array("id" => "8","plateno" => "KDE6886","location" => "HQ","driver_id" => "9"),
            array("id" => "9","plateno" => "KDB6886","location" => "HQ","driver_id" => "10"),
            array("id" => "10","plateno" => "KDA6896","location" => "HQ","driver_id" => "11"),
            array("id" => "11","plateno" => "KEP6006","location" => "HQ","driver_id" => "13"),
            array("id" => "12","plateno" => "KEE6498","location" => "HQ","driver_id" => "14"),
            array("id" => "13","plateno" => "KCH6599","location" => "HQ","driver_id" => "15"),
            array("id" => "14","plateno" => "KDA6986","location" => "HQ","driver_id" => "16"),
            array("id" => "15","plateno" => "KDJ9149","location" => "HQ","driver_id" => "22"),
            array("id" => "16","plateno" => "KEL3000","location" => "HQ","driver_id" => "18"),
            array("id" => "17","plateno" => "KDA6800","location" => "HQ","driver_id" => "19"),
            array("id" => "18","plateno" => "KDA6698","location" => "HQ","driver_id" => "20"),
            array("id" => "19","plateno" => "KDJ9150","location" => "HQ","driver_id" => "25"),
            array("id" => "20","plateno" => "KCH5699","location" => "HQ","driver_id" => "23"),
            array("id" => "21","plateno" => "KCF9758","location" => "HQ","driver_id" => "24"),
            array("id" => "22","plateno" => "KEP6600","location" => "HQ","driver_id" => "1"),
            array("id" => "23","plateno" => "KCM6886","location" => "HQ","driver_id" => "26"),
            array("id" => "24","plateno" => "KDA9869","location" => "HQ","driver_id" => "1"),
            array("id" => "25","plateno" => "KDC8886","location" => "HQ","driver_id" => "1"),
            array("id" => "26","plateno" => "KCG3155","location" => "HQ","driver_id" => "1"),
            array("id" => "27","plateno" => "KCU912","location" => "HQ","driver_id" => "1"),
            array("id" => "28","plateno" => "KCK3529","location" => "HQ","driver_id" => "1"),
            array("id" => "29","plateno" => "KCL7469","location" => "HQ","driver_id" => "1"),
            array("id" => "30","plateno" => "KCG3193","location" => "HQ","driver_id" => "1"),
            array("id" => "31","plateno" => "KCB5418","location" => "HQ","driver_id" => "1"),
            array("id" => "32","plateno" => "KBU1229","location" => "HQ","driver_id" => "1"),
            array("id" => "33","plateno" => "KCF9927","location" => "HQ","driver_id" => "1"),
            array("id" => "34","plateno" => "KCL7470","location" => "HQ","driver_id" => "1"),
            array("id" => "35","plateno" => "KDU54","location" => "HQ","driver_id" => "1"),
            array("id" => "36","plateno" => "KBD6931","location" => "HQ","driver_id" => "1"),
            array("id" => "37","plateno" => "KDC48","location" => "HQ","driver_id" => "1"),
            array("id" => "38","plateno" => "KDY458","location" => "HQ","driver_id" => "1"),
            array("id" => "39","plateno" => "KCT8777","location" => "HQ","driver_id" => "1"),
            array("id" => "40","plateno" => "KCJ9859","location" => "HQ","driver_id" => "1"),
            array("id" => "41","plateno" => "KCN6589","location" => "HQ","driver_id" => "1"),
        );
        DB::table('vehicles')->insert($vehicles);
    }
}
