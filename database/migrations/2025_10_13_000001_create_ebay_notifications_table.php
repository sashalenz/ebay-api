<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ebay_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->index();
            $table->string('recipient_user_id')->index();
            $table->string('notification_signature');
            $table->timestamp('timestamp');
            $table->string('correlation_id')->nullable();
            $table->json('payload');
            $table->timestamp('processed_at')->nullable();
            $table->enum('processing_status', ['pending', 'processing', 'completed', 'failed'])
                ->default('pending')
                ->index();
            $table->text('error_message')->nullable();
            $table->timestamps();

            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ebay_notifications');
    }
};
