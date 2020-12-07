<?php

namespace Database\Factories;

use App\Models\TaskAssignedUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;
use \App\Models\Task;


class TaskAssignedUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskAssignedUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_id' => Task::factory(),
            'user_id' => User::factory()
        ];
    }
}
