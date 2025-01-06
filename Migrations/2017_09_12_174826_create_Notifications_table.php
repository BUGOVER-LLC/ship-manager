<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use App\Ship\Database\Blueprint;
use App\Ship\Database\Schema;

return new class extends Migration
{
    /**
     * Run the Migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('Notifications', function (Blueprint $table) {
            $table->ulid('NotificationId')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('readAt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the Migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
