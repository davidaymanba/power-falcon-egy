<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_visits', function (Blueprint $table) {
            $table->id();
            $table->uuid('visitor_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable()->index();
            $table->string('method', 10);
            $table->string('path');
            $table->text('url')->nullable();
            $table->string('route_name')->nullable()->index();
            $table->text('referer')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('visited_at')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_visits');
    }
};
