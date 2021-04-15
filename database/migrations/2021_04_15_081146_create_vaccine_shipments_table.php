<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vaccine_type_id');
            $table->unsignedBigInteger('amount');
            $table->date('arrival_date');
            $table->timestamps();

            $table->foreign('vaccine_type_id')->references('id')->on('vaccine_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccine_shipments');
    }
}
