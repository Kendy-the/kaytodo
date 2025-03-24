<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
        });

        Schema::table('Projects', function(Blueprint $table) {
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
        });

        Schema::table('meetings', function(Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Project::class)->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('tasks', function(Blueprint $table) {
            $table->foreignIdFor(Project::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeignIdFor(User::class)->constrained()->cascadeOnDelete();
        });

        Schema::table('Projects', function(Blueprint $table) {
            $table->dropForeignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->dropForeignIdFor(User::class)->constrained()->cascadeOnDelete();
        });

        Schema::table('meetings', function(Blueprint $table) {
            $table->dropForeignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->dropForeignIdFor(Project::class)->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('tasks', function(Blueprint $table) {
            $table->dropForeignIdFor(Project::class)->constrained()->cascadeOnDelete();
            $table->dropForeignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->dropForeignIdFor(User::class)->constrained()->cascadeOnDelete();
        });
    }
};
