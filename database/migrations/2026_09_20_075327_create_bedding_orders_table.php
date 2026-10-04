<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bedding_orders', function (Blueprint $t): void {
            $t->id();
            $t->string('name', 100);
            $t->string('phone', 20);
            $t->string('email')->nullable()->index();
            $t->text('message');
            $t->string('status', 30)->default('new')->index();
            $t->string('ip_address', 45)->nullable();
            $t->string('user_agent', 500)->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bedding_orders');
    }
};
