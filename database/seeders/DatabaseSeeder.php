<?php

namespace Database\Seeders;

use App\Models\VaccineShipment;
use App\Models\VaccineType;
use App\Models\Volunteer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('password_resets')->truncate();
        DB::table('users')->truncate();

        DB::table('vaccine_shipments')->truncate();
        DB::table('volunteers')->truncate();
        DB::table('vaccine_types')->truncate();

        Schema::enableForeignKeyConstraints();

        VaccineType::factory()->count(3)->create();
        VaccineShipment::factory()->count(10)->create();
        Volunteer::factory()->count(10)->create();

        $this->call([
            UserSeeder::class,
        ]);
    }
}
