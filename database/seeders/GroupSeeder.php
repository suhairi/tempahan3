<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = array(
            array('id' => '1', 'name' => 'Jusa'),
            array('id' => '2', 'name' => 'Pengurusan & Professional'),
            array('id' => '3', 'name' => 'Sokongan 1'),
            array('id' => '4', 'name' => 'Sokongan 2'),
        );
        DB::table('groups')->insert($groups);
    }
}
