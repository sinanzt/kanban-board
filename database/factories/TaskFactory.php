<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'order' => $this->faker->randomDigit,
            'deadline' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+10 days', $timezone = null),
            'priority' => $this->faker->randomElement(["LOW","MEDIUM","HIGH"]),
            "task_state_id" => $this->faker->numberBetween($min = 1, $max = 6)
        ];
    }
}
