<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JawatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jawatans = array(
            array('id' => '1', 'name' => 'Akauntan'),
            array('id' => '2', 'name' => 'Juruaudio Visual'),
            array('id' => '3', 'name' => 'Juruteknik Komputer'),
            array('id' => '4', 'name' => 'Jurutera'),
            array('id' => '5', 'name' => 'Pegawai Ehwal Ekonomi'),
            array('id' => '6', 'name' => 'Pegawai Pertanian'),
            array('id' => '7', 'name' => 'Pegawai Tadbir'),
            array('id' => '8', 'name' => 'Pegawai Teknologi Maklumat'),
            array('id' => '9', 'name' => 'Pemandu Kenderaan '),
            array('id' => '10', 'name' => 'Pembantu Akauntan'),
            array('id' => '11', 'name' => 'Pembantu Awam'),
            array('id' => '12', 'name' => 'Pembantu Ehwal Ekonomi'),
            array('id' => '13', 'name' => 'Pembantu Kemahiran'),
            array('id' => '14', 'name' => 'Pembantu Operasi'),
            array('id' => '15', 'name' => 'Pembantu Setiausaha Pejabat'),
            array('id' => '16', 'name' => 'Pembantu Tadbir'),
            array('id' => '17', 'name' => 'Pembantu Tadbir (Perkeranian/Operasi)'),
            array('id' => '18', 'name' => 'Pengawal Keselamatan'),
            array('id' => '19', 'name' => 'Pengurus Besar, Jusa \'B\'  '),
            array('id' => '20', 'name' => 'Penjaga Jentera Elektrik '),
            array('id' => '21', 'name' => 'Penolong Akauntan'),
            array('id' => '22', 'name' => 'Penolong Jurutera'),
            array('id' => '23', 'name' => 'Penolong Jurutera (JSPS)'),
            array('id' => '24', 'name' => 'Penolong Pegawai Ehwal Ekonomi'),
            array('id' => '25', 'name' => 'Penolong Pegawai Pertanian'),
            array('id' => '26', 'name' => 'Penolong Pegawai Pertanian (JSPS)'),
            array('id' => '27', 'name' => 'Penolong Pegawai Tadbir'),
            array('id' => '28', 'name' => 'Penolong Pegawai Teknologi Maklumat'),
            array('id' => '29', 'name' => 'Setiausaha Pejabat'),
            array('id' => '30', 'name' => 'Timbalan Pengurus Besar, Jusa \'C\''),
        );

        DB::table('jawatans')->insert($jawatans);
    }
}
