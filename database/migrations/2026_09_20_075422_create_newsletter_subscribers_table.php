<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('newsletter_subscribers', function (Blueprint $t): void {
            $t->id();
            $t->string('email')->unique();
            $t->string('name', 100)->nullable();
            $t->string('source', 50)->default('bedding-order');
            $t->string('unsubscribe_token', 64)->unique();
            $t->timestamp('subscribed_at')->nullable();
            $t->timestamp('unsubscribed_at')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newsletter_subscribers');
    }
};
