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
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('country', 50);
            $table->string('province', 30);
            $table->string('City', 30);
            $table->string('street_address', 50);
            $table->string('postalcode', 6);
            $table->string('image');
            $table->text('description');
            $table->string('parking');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafes');
    }
};
