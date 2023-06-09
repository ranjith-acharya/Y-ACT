<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('residence');
            $table->string('native');
            $table->biginteger('contact')->length(12);
            $table->biginteger('alternate_contact')->length(12);
            $table->string('date_of_birth');
            $table->string('facebook_username')->nullable();
            $table->string('instagram_username')->nullable();
            $table->string('linkedin_username')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
