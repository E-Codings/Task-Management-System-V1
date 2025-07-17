<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    protected $model = \App\Models\Status::class;
    public function definition(): array
    {
        return [
            Status::NAME => $this->faker->word,
            Status::CREATED_BY => User::factory(),
            Status::MODIFY_BY => User::factory(),
            Status::REMARK => $this->faker->sentence,
            Status::CREATED_AT => now(),
            Status::UPDATED_AT => now(),
        ];
    }
}
