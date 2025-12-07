<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_admins_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();      // لأنه login بالاسم
            $table->string('email')->unique();
            $table->string('password');
            $table->string('api_token', 80)->nullable()->unique(); // للتوكن
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
