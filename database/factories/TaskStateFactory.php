<?php

namespace Database\Factories;

use App\Models\TaskState;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskStateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskState::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
