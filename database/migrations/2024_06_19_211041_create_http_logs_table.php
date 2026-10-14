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
        Schema::create('http_logs', function (Blueprint $table) {
            $table->id();
            $table->string('method', 10);
            $table->text('url');
            $table->integer('status_code');
            $table->longText('request_body');
            $table->float('response_time');
            $table->ipAddress('ip');
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('http_logs');
    }
};
