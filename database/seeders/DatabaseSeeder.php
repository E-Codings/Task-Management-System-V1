<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Status::factory()->create([
            Status::NAME => 'Pending',
            Status::CREATED_BY => 1,
            Status::MODIFY_BY => 1,
            Status::REMARK => 'This is a test status.',
            Status::CREATED_AT => now(),
            Status::UPDATED_AT => now(),
        ]);
    }
}
