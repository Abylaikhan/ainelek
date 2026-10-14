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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->fulltext();
            $table->string('slug');
            $table->string('keywords', 1000)->nullable();
            $table->string('description', 1000)->nullable();
            $table->longText('content')->fulltext();
            $table->string('image', 500)->nullable();
            $table->boolean('is_interesting')->default(false);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
