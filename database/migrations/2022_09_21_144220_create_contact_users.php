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
        Schema::create('contact_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('traveler_id')->constrained('user_detail');
            $table->foreignId('travel_agent_id')->constrained('travel_agents');
            $table->enum('type_user', ['traveller', 'travel_agent']);
            $table->string('phone_number');
            $table->string('address');
            $table->string('social_media_url');
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
        Schema::dropIfExists('contact_users');
    }
};