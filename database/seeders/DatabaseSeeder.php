<?php

namespace Database\Seeders;

use App\Models\VaccineShipment;
use App\Models\VaccineType;
use Database\Factories\VaccineShipmentFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        VaccineType::factory()->count(3)->create();
        VaccineShipment::factory()->count(10)->create();
    }
}
