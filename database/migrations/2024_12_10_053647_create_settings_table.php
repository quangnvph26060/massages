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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('address')->nullable();
            $table->string('hotline')->nullable();
            $table->text('map')->nullable();
            $table->string('email')->nullable();

            $table->string('title_seo')->nullable();
            $table->text('description_seo')->nullable();
            $table->text('keywords_seo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
