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
        Schema::table('chambre_proprite', function (Blueprint $table) {
            $table->dropForeign(['proprtie_id']);
            $table->dropForeign(['chambre_id']);
            $table->foreignId('proprtie_id')->change()->constrained()->onDelete('cascade');
            $table->foreignId('chambre_id')->change()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chambre_proprtie', function (Blueprint $table) {
            //
        });
    }
};
