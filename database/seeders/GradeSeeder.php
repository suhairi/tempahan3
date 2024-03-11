<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = array(
            array('id' => '1', 'name' => 'VU6', 'group_id' => 1),
            array('id' => '2', 'name' => 'VU7', 'group_id' => 1),
            array('id' => '3', 'name' => 'G54', 'group_id' => 2),
            array('id' => '4', 'name' => 'J54', 'group_id' => 2),
            array('id' => '5', 'name' => 'N54', 'group_id' => 2),
            array('id' => '6', 'name' => 'E54', 'group_id' => 2),
            array('id' => '7', 'name' => 'G52', 'group_id' => 2),
            array('id' => '8', 'name' => 'J52', 'group_id' => 2),
            array('id' => '9', 'name' => 'N48', 'group_id' => 2),
            array('id' => '10', 'name' => 'N52', 'group_id' => 2),
            array('id' => '11', 'name' => 'E48', 'group_id' => 2),
            array('id' => '12', 'name' => 'E52', 'group_id' => 2),
            array('id' => '13', 'name' => 'G48', 'group_id' => 2),
            array('id' => '14', 'name' => 'F48', 'group_id' => 2),
            array('id' => '15', 'name' => 'J48', 'group_id' => 2),
            array('id' => '16', 'name' => 'E44', 'group_id' => 2),
            array('id' => '17', 'name' => 'F44', 'group_id' => 2),
            array('id' => '18', 'name' => 'G44', 'group_id' => 2),
            array('id' => '19', 'name' => 'J44', 'group_id' => 2),
            array('id' => '20', 'name' => 'N44', 'group_id' => 2),
            array('id' => '21', 'name' => 'WA44', 'group_id' => 2),
            array('id' => '22', 'name' => 'E41', 'group_id' => 2),
            array('id' => '23', 'name' => 'F41', 'group_id' => 2),
            array('id' => '24', 'name' => 'G41', 'group_id' => 2),
            array('id' => '25', 'name' => 'J41', 'group_id' => 2),
            array('id' => '26', 'name' => 'N41', 'group_id' => 2),
            array('id' => '27', 'name' => 'WA41', 'group_id' => 2),
            array('id' => '28', 'name' => 'FA38', 'group_id' => 3),
            array('id' => '29', 'name' => 'JA38', 'group_id' => 3),
            array('id' => '30', 'name' => 'E38', 'group_id' => 3),
            array('id' => '31', 'name' => 'G36', 'group_id' => 3),
            array('id' => '32', 'name' => 'JA36', 'group_id' => 3),
            array('id' => '33', 'name' => 'N36', 'group_id' => 3),
            array('id' => '34', 'name' => 'FA32', 'group_id' => 3),
            array('id' => '35', 'name' => 'G32', 'group_id' => 3),
            array('id' => '36', 'name' => 'N32', 'group_id' => 3),
            array('id' => '37', 'name' => 'W32', 'group_id' => 3),
            array('id' => '38', 'name' => 'FA29', 'group_id' => 3),
            array('id' => '39', 'name' => 'JA29', 'group_id' => 3),
            array('id' => '40', 'name' => '29(JA)', 'group_id' => 3),
            array('id' => '41', 'name' => 'N30', 'group_id' => 3),
            array('id' => '42', 'name' => 'E29', 'group_id' => 3),
            array('id' => '43', 'name' => 'E32', 'group_id' => 3),
            array('id' => '44', 'name' => 'G29', 'group_id' => 3),
            array('id' => '45', 'name' => 'G32(KUP)', 'group_id' => 3),
            array('id' => '46', 'name' => '29(G)', 'group_id' => 3),
            array('id' => '47', 'name' => 'N29', 'group_id' => 3),
            array('id' => '48', 'name' => 'N29', 'group_id' => 3),
            array('id' => '49', 'name' => 'N32', 'group_id' => 3),
            array('id' => '50', 'name' => 'W29', 'group_id' => 3),
            array('id' => '51', 'name' => 'N26', 'group_id' => 3),
            array('id' => '53', 'name' => 'N22', 'group_id' => 3),
            array('id' => '54', 'name' => 'N22', 'group_id' => 3),
            array('id' => '55', 'name' => 'W22', 'group_id' => 3),
            array('id' => '56', 'name' => 'H22(KUP)', 'group_id' => 3),
            array('id' => '57', 'name' => 'J22', 'group_id' => 3),
            array('id' => '58', 'name' => 'FT19', 'group_id' => 3),
            array('id' => '59', 'name' => 'FT22', 'group_id' => 3),
            array('id' => '60', 'name' => 'N19', 'group_id' => 3),
            array('id' => '61', 'name' => 'N19', 'group_id' => 3),
            array('id' => '62', 'name' => 'N22', 'group_id' => 3),
            array('id' => '63', 'name' => 'E19', 'group_id' => 3),
            array('id' => '64', 'name' => 'E22', 'group_id' => 3),
            array('id' => '65', 'name' => 'N19', 'group_id' => 3),
            array('id' => '66', 'name' => 'N22(KUP)', 'group_id' => 3),
            array('id' => '67', 'name' => 'H19', 'group_id' => 3),
            array('id' => '68', 'name' => 'H22', 'group_id' => 3),
            array('id' => '69', 'name' => 'J19', 'group_id' => 3),
            array('id' => '70', 'name' => 'G44(KUP)', 'group_id' => 2),
            array('id' => '71', 'name' => 'W19', 'group_id' => 3),
            array('id' => '73', 'name' => 'H16', 'group_id' => 4),
            array('id' => '74', 'name' => 'KP14', 'group_id' => 4),
            array('id' => '75', 'name' => 'N14', 'group_id' => 4),
            array('id' => '76', 'name' => 'H14', 'group_id' => 4),
            array('id' => '77', 'name' => 'H14', 'group_id' => 4),
            array('id' => '78', 'name' => 'KP11', 'group_id' => 4),
            array('id' => '80', 'name' => 'H11', 'group_id' => 4),
            array('id' => '81', 'name' => 'H11', 'group_id' => 4),
            array('id' => '82', 'name' => 'N11', 'group_id' => 4),
            array('id' => '83', 'name' => 'J44(KUP)', 'group_id' => 2),
            array('id' => '84', 'name' => 'N44(KUP)', 'group_id' => 2),
            array('id' => '85', 'name' => 'E52(KUP)', 'group_id' => 2),
            array('id' => '86', 'name' => 'E44(KUP)', 'group_id' => 2),
            array('id' => '87', 'name' => 'WA44(KUP)', 'group_id' => 2),
            array('id' => '88', 'name' => 'FA32(KUP)', 'group_id' => 3),
            array('id' => '89', 'name' => 'E32(KUP)', 'group_id' => 3),
            array('id' => '90', 'name' => 'W22(KUP)', 'group_id' => 3),
            array('id' => '91', 'name' => 'N22(KUP)', 'group_id' => 3),
            array('id' => '92', 'name' => 'H14(KUP)', 'group_id' => 4),
            array('id' => '94', 'name' => 'N14(KUP)', 'group_id' => 4),
            array('id' => '93', 'name' => 'H14(KUP)', 'group_id' => 4),
            array('id' => '95', 'name' => 'W22(KUP)','group_id' =>  3)

        );
        DB::table('grades')->insert($grades);
    }
}
