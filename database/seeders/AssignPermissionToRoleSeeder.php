<?php

namespace Database\Seeders;

use App\Constants\PermissionConstant;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssignPermissionToRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name','admin')->first();
        $employee = Role::where('name','employee')->first();

        $admin->givePermissionTo(PermissionConstant::VIEW_PROJECT);
        $admin->givePermissionTo(PermissionConstant::CREATE_PROJECT);
        $admin->givePermissionTo(PermissionConstant::EDIT_PROJECT);
        $admin->givePermissionTo(PermissionConstant::REMOVE_PROJECT);

        $employee->givePermissionTo(PermissionConstant::VIEW_PROJECT);
        $employee->givePermissionTo(PermissionConstant::EDIT_PROJECT);

        $admin->givePermissionTo(PermissionConstant::VIEW_TASK);
        $admin->givePermissionTo(PermissionConstant::CREATE_TASK);
        $admin->givePermissionTo(PermissionConstant::EDIT_TASK);
        $admin->givePermissionTo(PermissionConstant::REMOVE_TASK);

        $employee->givePermissionTo(PermissionConstant::VIEW_TASK);
        $employee->givePermissionTo(PermissionConstant::CREATE_TASK);
        $employee->givePermissionTo(PermissionConstant::EDIT_TASK);

    }
}
