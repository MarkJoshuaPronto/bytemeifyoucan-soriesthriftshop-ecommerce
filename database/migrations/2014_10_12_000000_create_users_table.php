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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('is_admin')->default(0)->comment('0:customer, 1: admin');
            $table->tinyInteger('status')->default(0)->comment('0:active, 1: inactive');
            $table->tinyInteger('is_delete')->default(0)->comment('0:not, 1: deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
