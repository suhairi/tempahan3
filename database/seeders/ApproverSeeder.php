<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ApproverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pnp = [70, 83, 84, 86, 87, 85];
        $approvers = Staff::query()
                        ->where('kod_gred_semasa', '<=', 27)                        
                        ->get();
        foreach($approvers as $approver)
        {
            if($approver->staff_id != 3834)
            {
                $user = User::create([
                    'name'          => $approver->nama,
                    'email'         => fake()->email(),
                    'staffid'       => $approver->staff_id,
                    'password'      => bcrypt('password'),
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
                $user->assignRole('Approver');
            }
        }

        $approvers = Staff::query()
                        ->$approvers = Staff::query()
                        ->whereIn('kod_gred_semasa', $pnp)
                        ->get();

        foreach($approvers as $approver)
        {
            if($approver->staff_id != 3834)
            {
                $user = User::create([
                    'name'          => $approver->nama,
                    'email'         => fake()->email(),
                    'staffid'       => $approver->staff_id,
                    'password'      => bcrypt('password'),
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
                $user->assignRole('Approver');
            }
        }

    }
}
