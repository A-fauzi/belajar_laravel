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
        Schema::create('travel_agents', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('destination_id')->constrained('destinations');

            // $table->foreignId('contact_id')->constrained('contact_users');

            $table->string('name');
            $table->string('photo_url')->nullable();
            $table->enum('status', ['verified', 'not verified']);
            $table->string('rating')->nullable();
            $table->string('about')->nullable();
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
        Schema::dropIfExists('travel_agents');
    }
};
