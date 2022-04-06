<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'time' => $this->faker->numberBetween(2,3),
        ];
    }
}
