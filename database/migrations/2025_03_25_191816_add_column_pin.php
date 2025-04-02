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
        Schema::table('Categories', function(Blueprint $table) {
            $table->boolean('pin')->default(false);
        });
        Schema::table('Projects', function(Blueprint $table) {
            $table->boolean('pin')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Categories', function(Blueprint $table) {
            $table->dropColumn('pin');
        });
        Schema::table('Projects', function(Blueprint $table) {
            $table->dropColumn('pin');
        });
    }
};
