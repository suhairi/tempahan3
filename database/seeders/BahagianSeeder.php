<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahagians = array(
            array('id' => 1, 'name' => 'Bahagian Industri Makanan & Usahawan', 'singkatan' => 'BIM&BU'),
            array('id' => 2, 'name' => 'Wilayah I, Kangar','singkatan' =>  'W1'),
            array('id' => 3, 'name' => 'Wilayah II, Jitra','singkatan' =>  'W2'),
            array('id' => 4, 'name' => 'Wilayah III, Pendang','singkatan' =>  'W3'),
            array('id' => 5, 'name' => 'Wilayah IV, Kota Sarang Semut','singkatan' =>  'W4'),
            array('id' => 6, 'name' => 'Bahagian Industri Padi','singkatan' =>  'BIP'),
            array('id' => 7, 'name' => 'Bahagian Khidmat Pengurusan','singkatan' =>  'BKP'),
            array('id' => 8, 'name' => 'Bahagian Pengurusan Empangan & Sumber Air', 'singkatan' => 'BPE&SA'),
            array('id' => 9, 'name' => 'Bahagian Pengurusan Institusi Peladang','singkatan' =>  'BPIP'),
            array('id' => 10, 'name' => 'Bahagian Pengurusan Wilayah','singkatan' =>  'BPW'),
            array('id' => 11, 'name' => 'Bahagian Perancangan & Teknologi Maklumat', 'singkatan' => 'BP&TM'),
            array('id' => 12, 'name' => 'Bahagian Pembangunan dan Pengurusan Projek','singkatan' =>  'BPPP'),
            array('id' => 13, 'name' => 'Bahagian Perkhidmatan Pengairan & Saliran', 'singkatan' => 'BPP&S'),
            array('id' => 14, 'name' => 'Bahagian Mekanikal dan Elektrikal','singkatan' =>  'BME'),
            array('id' => 15, 'name' => 'Cawangan Audit Dalam','singkatan' =>  'AUDIT'),
            array('id' => 16, 'name' => 'Unit Integriti','singkatan' =>  'INTEGRITI'),
            array('id' => 26, 'name' => '**Unknown','singkatan' =>  '**UNKNOWN'),
        );
        DB::table('bahagians')->insert($bahagians);
    }
}
