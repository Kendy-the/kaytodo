<?php

use App\Models\User;
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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class,'invite_id')->constrained()->cascadeOnDelete()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeignIdFor(User::class)->constrained()->cascadeOnDelete();
        $table->dropForeignIdFor(User::class,'invite_id')->constrained()->cascadeOnDelete();
        Schema::dropIfExists('chats');
    }
};
