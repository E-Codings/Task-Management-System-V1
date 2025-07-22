<?php

namespace Database\Seeders;

use App\Constants\PermissionConstant;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => PermissionConstant::VIEW_PROJECT, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::CREATE_PROJECT, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::EDIT_PROJECT, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::REMOVE_PROJECT, 'guard_name' => 'web']);

        Permission::firstOrCreate(['name' => PermissionConstant::VIEW_TASK, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::CREATE_TASK, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::EDIT_TASK, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::REMOVE_TASK, 'guard_name' => 'web']);



        Permission::firstOrCreate(['name' => PermissionConstant::VIEW_USER, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::CREATE_USER, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::EDIT_USER, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::REMOVE_USER, 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => PermissionConstant::PROFILE_USER, 'guard_name' => 'web']);
    }
}
