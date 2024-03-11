<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeksyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seksyens = array(
            array("id" => 1, "name" => "Agropelancongan Dan Projek Khas"),
            array("id" => 2, "name" => "Pembangunan Teknologi Pemprosesan"),
            array("id" => 3, "name" => "Rezeki Tani"),
            array("id" => 4, "name" => "Tanaman"),
            array("id" => 5, "name" => "Ternakan Dan Akuakultur"),
            array("id" => 6, "name" => "Pembangunan Produk Dan Akreditasi"),
            array("id" => 7, "name" => "Pemasaran"),
            array("id" => 8, "name" => "High Impact Projek"),
            array("id" => 9, "name" => "Pembangunan Projek dan Dokumentasi"),
            array("id" => 10, "name" => "Operasi dan Hidrologi"),
            array("id" => 11, "name" => "Penyelenggaraan"),
            array("id" => 12, "name" => "Perladangan\/nkea"),
            array("id" => 13, "name" => "Pengembangan dan Teknologi"),
            array("id" => 14, "name" => "Industri Asas Tani dan Bukan Padi"),
            array("id" => 15, "name" => "Pengurusan Institusi Peladang"),
            array("id" => 16, "name" => "Promosi Teknologi"),
            array("id" => 17, "name" => "Agronomi dan Kualiti Pengeluaran Padi"),
            array("id" => 18, "name" => "Perlindungan Tanaman"),
            array("id" => 19, "name" => "Kesuburan Tanah dan Tanaman"),
            array("id" => 20, "name" => "Bekalan Input"),
            array("id" => 21, "name" => "Pengurusan Estet Padi"),
            array("id" => 22, "name" => "Operasi dan Pemantauan"),
            array("id" => 23, "name" => "Pembangunan Estet Padi"),
            array("id" => 24, "name" => "Operasi dan Perkhidmatan"),
            array("id" => 25, "name" => "Latihan"),
            array("id" => 26, "name" => "Unit Pengurusan Pentadbiran dan Khidmat Sokongan"),
            array("id" => 27, "name" => "Kewangan dan Pengurusan Aset"),
            array("id" => 28, "name" => "Akaun"),
            array("id" => 29, "name" => "Operasi dan Perolehan"),
            array("id" => 30, "name" => "Penyelenggaraan Dan Landskap"),
            array("id" => 31, "name" => "Logistik"),
            array("id" => 32, "name" => "Mada TV"),
            array("id" => 33, "name" => "Pengurusan Pelanggan"),
            array("id" => 34, "name" => "Fasiliti"),
            array("id" => 35, "name" => "Khidmat Sokongan"),
            array("id" => 36, "name" => "Keselamatan Empangan"),
            array("id" => 37, "name" => "Operasi dan Penyenggaraan"),
            array("id" => 38, "name" => "Pengurusan Tasik"),
            array("id" => 39, "name" => "Pengurusan Tadahan"),
            array("id" => 40, "name" => "Penyeliaan dan Perundangan PPK"),
            array("id" => 41, "name" => "Penyeliaan Korporat"),
            array("id" => 42, "name" => "Pengurusan Perniagaan Tani Dan Kredit"),
            array("id" => 43, "name" => "Penyeliaan Kewangan dan Audit Pengurusan"),
            array("id" => 44, "name" => "Teknikal"),
            array("id" => 45, "name" => "Dasar"),
            array("id" => 46, "name" => "Kerjasama Strategik Dan Statistik"),
            array("id" => 47, "name" => "Penyelarasan Belanjawan dan Pembangunan"),
            array("id" => 48, "name" => "Pemantauan dan Penilaian Projek"),
            array("id" => 49, "name" => "Penyelarasan Kajian"),
            array("id" => 50, "name" => "GIS"),
            array("id" => 51, "name" => "Penyenggaraan Server dan Rangkaian"),
            array("id" => 52, "name" => "Penyenggaraan Peralatan Sistem Komputer"),
            array("id" => 53, "name" => "Pembangunan dan Penyenggaraan Sistem Aplikasi"),
            array("id" => 54, "name" => "Rekabentuk"),
            array("id" => 55, "name" => "Pengurusan Kontrak dan Ukur Bahan"),
            array("id" => 56, "name" => "Pembinaan dan Penyeliaan"),
            array("id" => 57, "name" => "Perancangan dan Penilaian Impak Pembangunan Infrastruktur"),
            array("id" => 58, "name" => "Pengairan dan Saliran"),
            array("id" => 59, "name" => "Pemantauan dan Penyelarasan Pengairan dan Saliran"),
            array("id" => 60, "name" => "Pembangunan Sumber Air"),
            array("id" => 61, "name" => "Telemetri dan Komunikasi Radio"),
            array("id" => 62, "name" => "Pengurusan Kualiti Air dan Tentu Ukur"),
            array("id" => 63, "name" => "Alator \/ Empangan"),
            array("id" => 64, "name" => "Pam Diesel"),
            array("id" => 65, "name" => "Pusat Mekanisasi"),
            array("id" => 66, "name" => "Pusat Penyebaran Innovasi"),
            array("id" => 67, "name" => "Pam Elektrik"),
            array("id" => 68, "name" => "Kelengkapan Elektrik"),
            array("id" => 69, "name" => "Kenderaan"),
            array("id" => 70, "name" => "Logistik"),
            array("id" => 71, "name" => "Rekabentuk dan Kemahiran"),
            array("id" => 72, "name" => "Pusat Latihan Kejenteraan Pertanian"),
            array("id" => 73, "name" => "Pengurusan Aset"),
            array("id" => 74, "name" => "Jentera Berat"),
            array("id" => 75, "name" => "Pertanian dan Industri Asas Tani"),
        );
        DB::table('seksyens')->insert($seksyens);
    }
}
