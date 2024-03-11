<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = Permission::create(['name' => 'users-create', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'users-edit', 'guard_name' => 'web']);
        $permission = Permission::create(['name' => 'users-delete', 'guard_name' => 'web']);
    }
}
