<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'users', callback: function (blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'email')->unique();
            $table->timestamp(column: 'email_verified_at')->nullable();
            $table->string(column: 'password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create(table: 'password_reset_tokens', callback: function (blueprint $table) {
            $table->string(column: 'email')->primary();
            $table->string(column: 'token');
            $table->timestamp(column: 'created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(table: 'password_reset_tokens');
        Schema::dropIfExists(table: 'users');
    }
};
