<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'code' => $this->faker->numerify("CLI###"),
            'name' => $this->faker->company,
            'street' => $this->faker->streetAddress,
            'place' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'country_id' => $this->faker->numberBetween(1,15),
            'organisation_id' => 1,
        ];
    }
}
