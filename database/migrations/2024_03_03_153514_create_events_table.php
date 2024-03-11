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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('description');
            $table->dateTime('date');
            $table->string('venue');
            $table->integer('number_of_seats');
            $table->integer('price_per_seat');
            $table->string('validation_type');
            $table->dateTime('validated_at')->nullable();
            $table->foreignId('organizer_id')->constrained('organizers');
            $table->foreignId('category_id')->constrained('categories');
            $table->dateTime('rejected_at')->nullable();
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
