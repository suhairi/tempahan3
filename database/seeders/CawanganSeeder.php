<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CawanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cawangans = array(
            // array("id" => "0","name" => "-","bahagian_id" => "16"),
            array("id" => "1","name" => "Pembangunan Usahawan","bahagian_id" => "1"),
            array("id" => "2","name" => "Agromakanan","bahagian_id" => "1"),
            array("id" => "3","name" => "Pembangunan Perniagaan","bahagian_id" => "1"),
            array("id" => "4","name" => "Khidmat Sokongan","bahagian_id" => "1"),
            array("id" => "5","name" => "Timbalan Pengurus Wilayah (Teknikal)","bahagian_id" => "2"),
            array("id" => "6","name" => "Timbalan Pengurus Wilayah (Pertanian)","bahagian_id" => "2"),
            array("id" => "7","name" => "Pembangunan Peladang","bahagian_id" => "2"),
            array("id" => "8","name" => "Lokaliti AI - Arau","bahagian_id" => "2"),
            array("id" => "9","name" => "Lokaliti BI - Kayang","bahagian_id" => "2"),
            array("id" => "10","name" => "Lokaliti CI - Kangar","bahagian_id" => "2"),
            array("id" => "11","name" => "Lokaliti DI - Tambun Tulang","bahagian_id" => "2"),
            array("id" => "12","name" => "Lokaliti EI - Simpang Empat","bahagian_id" => "2"),
            array("id" => "13","name" => "Lokaliti AII - Kodiang","bahagian_id" => "3"),
            array("id" => "14","name" => "Lokaliti BII - Sanglang","bahagian_id" => "3"),
            array("id" => "15","name" => "Lokaliti CII - Kerpan","bahagian_id" => "3"),
            array("id" => "16","name" => "Lokaliti DII - Tunjang","bahagian_id" => "3"),
            array("id" => "17","name" => "Lokaliti EII - Kubang Sepat","bahagian_id" => "3"),
            array("id" => "18","name" => "Lokaliti FII - Jerlun","bahagian_id" => "3"),
            array("id" => "19","name" => "Lokaliti GII - Jitra","bahagian_id" => "3"),
            array("id" => "20","name" => "Lokaliti HII - Kepala Batas","bahagian_id" => "3"),
            array("id" => "21","name" => "Lokaliti III - Kuala Sungai","bahagian_id" => "3"),
            array("id" => "22","name" => "Lokaliti AIII - Hutan Kampung","bahagian_id" => "4"),
            array("id" => "23","name" => "Lokaliti BIII - Alor Senibong","bahagian_id" => "4"),
            array("id" => "24","name" => "Lokaliti CIII - Tajar","bahagian_id" => "4"),
            array("id" => "25","name" => "Lokaliti DIII - Titi Haji Idris","bahagian_id" => "4"),
            array("id" => "26","name" => "Lokaliti EIII - Kokbah","bahagian_id" => "4"),
            array("id" => "27","name" => "Lokaliti FIII - Pendang","bahagian_id" => "4"),
            array("id" => "28","name" => "Lokaliti AIV - Batas Paip","bahagian_id" => "5"),
            array("id" => "29","name" => "Lokaliti BIV - Pengkalan Kundur","bahagian_id" => "5"),
            array("id" => "30","name" => "Lokaliti CIV - Kangkong","bahagian_id" => "5"),
            array("id" => "31","name" => "Lokaliti DIV - Permatang Buluh","bahagian_id" => "5"),
            array("id" => "32","name" => "Lokaliti EIV - Bukit Besar","bahagian_id" => "5"),
            array("id" => "33","name" => "Lokaliti FIV - Sungai Limau","bahagian_id" => "5"),
            array("id" => "34","name" => "Lokaliti GIV - Guar Cempedak","bahagian_id" => "5"),
            array("id" => "35","name" => "Loji Benih","bahagian_id" => "6"),
            array("id" => "36","name" => "Pengurusan Input Pertanian","bahagian_id" => "6"),
            array("id" => "37","name" => "Estet Padi","bahagian_id" => "6"),
            array("id" => "38","name" => "Pengurusan Sumber Manusia","bahagian_id" => "7"),
            array("id" => "39","name" => "Kewangan Dan Akaun","bahagian_id" => "7"),
            array("id" => "40","name" => "Pentadbiran","bahagian_id" => "7"),
            array("id" => "41","name" => "Komunikasi Korporat","bahagian_id" => "7"),
            array("id" => "42","name" => "Seksyen Perolehan Dan Sokongan","bahagian_id" => "7"),
            array("id" => "43","name" => "Pengurusan Empangan","bahagian_id" => "8"),
            array("id" => "44","name" => "Pengurusan Tasik Dan Tadahan","bahagian_id" => "8"),
            array("id" => "45","name" => "Urusan Pendaftar","bahagian_id" => "9"),
            array("id" => "46","name" => "Penyeliaan Kewangan Dan Perniagaan Tani","bahagian_id" => "9"),
            array("id" => "47","name" => "Penyelarasan Dan Pemantauan","bahagian_id" => "10"),
            array("id" => "48","name" => "Perancangan Dan Pembangunan","bahagian_id" => "11"),
            array("id" => "49","name" => "Pengurusan Kajian Dan Statistik","bahagian_id" => "11"),
            array("id" => "50","name" => "Teknologi Maklumat","bahagian_id" => "11"),
            array("id" => "51","name" => "Perancangan Dan Pembangunan","bahagian_id" => "12"),
            array("id" => "52","name" => "Pembangunan Rancangan Tempatan, Khidmat Teknikal Dan Pengurusan Tanah","bahagian_id" => "12"),
            array("id" => "53","name" => "Pengurusan Projek Infrastruktur Nkea","bahagian_id" => "12"),
            array("id" => "54","name" => "Pengairan Dan Saliran","bahagian_id" => "13"),
            array("id" => "55","name" => "Hidrologi","bahagian_id" => "13"),
            array("id" => "56","name" => "Hidro Mekanikal","bahagian_id" => "14"),
            array("id" => "57","name" => "Center Of Excellence M&E","bahagian_id" => "14"),
            array("id" => "58","name" => "Kejuruteraan Elektrik","bahagian_id" => "14"),
            array("id" => "59","name" => "Automotif","bahagian_id" => "14"),
            array("id" => "60","name" => "Pembangunan Teknikal","bahagian_id" => "14"),
            array("id" => "61","name" => "Mekanisasi Dan Automasi","bahagian_id" => "14"),
            array("id" => "62","name" => "Seksyen Audit Prestasi Dan Audit Khas","bahagian_id" => "15"),
            array("id" => "63","name" => "Seksyen Audit Kewangan Dan Susulan","bahagian_id" => "15"),
            array("id" => "64","name" => "Seksyen Pentadbiran","bahagian_id" => "15"),
            array("id" => "65","name" => "Pengembangan","bahagian_id" => "6"),
            array("id" => "66","name" => "Timbalan Pengurus Wilayah (Teknikal)","bahagian_id" => "3"),
            array("id" => "67","name" => "Timbalan Pengurus Wilayah (Prtanian)","bahagian_id" => "3"),
            array("id" => "68","name" => "Timbalan Pengurus Wilayah (Teknikal)","bahagian_id" => "4"),
            array("id" => "69","name" => "Timbalan Pengurus Wilayah (Pertanian)","bahagian_id" => "4"),
            array("id" => "70","name" => "Timbalan Pengurus Wilayah (Teknikal)","bahagian_id" => "5"),
            array("id" => "71","name" => "Timbalan Pengurus Wilayah (Pertanian)","bahagian_id" => "5"),
        );
        DB::table('cawangans')->insert($cawangans);
    }
}
