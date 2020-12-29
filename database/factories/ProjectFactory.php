<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->name,
            'code' => $this->faker->numerify('PRO###'),
            'description' => $this->faker->text(200),
            'organisation_id' => 1,
            'status_id' => $this->faker->numberBetween(1,3),
            'client_id' => $this->faker->numberBetween(1,30),
            'leader_id' => User::factory(),
            'starting_at' => $this->faker->dateTimeThisYear,
            'deadline_at' => $this->faker->dateTimeThisYear
        ];
    }
}
