<?php

namespace Database\Factories;

use App\Models\VaccineType;
use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolunteerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Volunteer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vaccine_type_id' => $this->faker->numberBetween(1, VaccineType::count()),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'preferred_date' => date('Y-m-d', strtotime( '+' . mt_rand(1, 30) . ' days'))
        ];
    }
}
