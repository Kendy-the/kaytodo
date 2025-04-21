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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('content')->nullable();
            $table->foreignIdFor(User::class,'sender_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class,'recipient_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeignIdFor(User::class,'sender_id')->constrained()->cascadeOnDelete();
        $table->dropForeignIdFor(User::class,'recipient_id')->constrained()->cascadeOnDelete();
        Schema::dropIfExists('messages');
    }
};
