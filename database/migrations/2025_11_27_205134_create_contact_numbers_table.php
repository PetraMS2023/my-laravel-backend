<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_contact_numbers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // name1..name4 (اسم الرقم)
            $table->string('number');        // رقم الموبايل / الهاتف
            $table->unsignedTinyInteger('position'); // 1,2,3,4
            $table->timestamps();

            // كل position (1-4) يكون مميز
            $table->unique('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_numbers');
    }
};
