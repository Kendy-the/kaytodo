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
        Schema::table('Tasks', function(Blueprint $table) {
            $table->integer('statut')->default(0);
        });
        Schema::table('Projects', function(Blueprint $table) {
            $table->integer('statut')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Tasks', function(Blueprint $table) {
            $table->dropColumn('statut');
        });
        Schema::table('Projects', function(Blueprint $table) {
            $table->dropColumn('statut');
        });
    }
};
