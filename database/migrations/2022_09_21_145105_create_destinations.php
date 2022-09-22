<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_saved')->default(0)->unsigned();
            $table->string('name');
            $table->string('rating')->nullable();
            $table->string('trip_plan');

            $table->foreignId('travel_agent_id')->constrained('travel_agents');

            $table->enum('transport', ['AC bus', 'Non AC bus'])->default('AC bus');
            $table->enum('hotel', ['Double Bed', 'Deluxe Room'])->default('Double Bed');

            // $table->foreignId('photos_id')->constrained('destination_photos');

            $table->string('map_url');

            $table->bigInteger('total_cost')->default(0)->unsigned();

            $table->foreignId('user_joins')->constrained('user_detail');

            $table->bigInteger('total_user_join')->nullable()->default(0);

            $table->string('date_range');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
};
