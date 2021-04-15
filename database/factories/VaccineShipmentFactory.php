<?php

namespace Database\Factories;

use App\Models\VaccineShipment;
use App\Models\VaccineType;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccineShipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VaccineShipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() : array
    {
        return [
            'vaccine_type_id' => $this->faker->numberBetween(1, VaccineType::count()),
            'amount' => rand(1000, 1000000),
            'arrival_date' => date('Y-m-d', strtotime( '+' . mt_rand(-30, 30) . ' days'))
        ];
    }
}
