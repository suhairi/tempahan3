<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'      => strtoupper('Suhairi Abdul Hamid'),
            'email'     => 'suhairi81@gmail.com',
            'staffid'   => '3374',
            'password'  => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('Super Admin');

        $user = User::create([
            'name'      => strtoupper('Mohammad Hafizi Hazran bin Md Zuki'),
            'email'     => 'hazran@mada.gov.my',
            'staffid'   => '3834',
            'password'  => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('Super Admin');
        $user->assignRole('Approver');

        $user = User::create([
            'name'      => strtoupper('Juliana binti Abdul Sattar'),
            'email'     => 'juliana@mada.gov.my',
            'staffid'   => '2419',
            'password'  => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('Admin');

        $user = User::create([
            'name'      => strtoupper('Mohd Zuhdi bin Jamaludin'),
            'email'     => 'zuhdi@mada.gov.my',
            'staffid'   => '3703',
            'password'  => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('Admin');

        $user = User::create([
            'name'      => strtoupper('Nur Farah Amylia binti Zakri'),
            'email'     => 'farahamylia1997@gmail.com',
            'staffid'   => '4052',
            'password'  => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('Admin');

        $user = User::create([
            'name'      => strtoupper('Mohd Haiqal bin Shahardi'),
            'email'     => 'haiqalshahardi@gmail.com',
            'staffid'   => '4020',
            'password'  => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('Admin');

        $users = array(
            array("id" => "7","name" => "NOR AFZAN BINTI ZAIM","email" => "afzan@mada.gov.my","staffid" => "2841", 'password' => bcrypt('password')),
            array("id" => "8","name" => "UMI HANI BINTI HEDZER","email" => "umihani@mada.gov.my","staffid" => "2686", 'password' => bcrypt('password')),
            array("id" => "9","name" => "MOHD SHUKOR BIN SAAD","email" => "shukor@mada.gov.my","staffid" => "2530", 'password' => bcrypt('password')),
            array("id" => "10","name" => "AMEELIA BINTI JAAFAR SIDIK","email" => "ameelia@mada.gov.my","staffid" => "3172", 'password' => bcrypt('password')),
            array("id" => "11","name" => "NORMUNIRA BINTI SHAFIEE","email" => "normunira@mada.gov.my","staffid" => "3338", 'password' => bcrypt('password')),
            array("id" => "12","name" => "NORHAFIZAH BINTI MOHD KAMARUDIN","email" => "norhafizah@mada.gov.my","staffid" => "3168", 'password' => bcrypt('password')),
            array("id" => "13","name" => "FARAH WAHIDA BINTI ABDUL WAHAB","email" => "farah@mada.gov.my","staffid" => "2684", 'password' => bcrypt('password')),
            array("id" => "14","name" => "KHAIROL BAZILAH BINTI BAHARRUDIN","email" => "khairolbazilah@mada.gov.my","staffid" => "3279", 'password' => bcrypt('password')),
            array("id" => "15","name" => "NOOR ADAWATI BINTI ADENAN","email" => "adawati@mada.gov.my","staffid" => "2743", 'password' => bcrypt('password')),
            array("id" => "16","name" => "HAFIZA BINTI ZAINOL ABIDIN","email" => "hafiza@mada.gov.my","staffid" => "2745", 'password' => bcrypt('password')),
            array("id" => "17","name" => "FATIMAH BINTI TALIB","email" => "fatimah@mada.gov.my","staffid" => "2374", 'password' => bcrypt('password')),
            array("id" => "18","name" => "JAMALIL ARIS BIN ABD. RAHIM","email" => "jamalil@mada.gov.my","staffid" => "2692", 'password' => bcrypt('password')),
        );
        DB::table('users')->insert($users);

        foreach($users as $user)
        {
            $user = User::find($user['id']);
            $user->assignRole('Clerk');
        }
    }
}
