<?php

use App\Models\Meeting;
use App\Models\User_Contact;
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
        Schema::create('user_contact_meeting', function (Blueprint $table) {
            $table->foreignIdFor(User_Contact::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(meeting::class)->constrained()->cascadeOnDelete();
            $table->primary(['user_contact_id', 'meeting_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_contact_meeting');
    }
};
