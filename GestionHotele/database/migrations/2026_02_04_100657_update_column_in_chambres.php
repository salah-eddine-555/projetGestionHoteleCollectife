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
        Schema::table('chambres', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('description');
            $table->decimal('price_per_night', 8, 2);
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chambres', function (Blueprint $table) {
            //
        });
    }
};
