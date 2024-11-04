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
        Schema::create(config('filament-stripe.table_names.features'), function (Blueprint $table) {
            $table->id();
            $table->string('stripe_id')->nullable();
            $table->boolean('active')->default(true);
            $table->json('metadata')->nullable();
            $table->string('stripe_price')->nullable();
            $table->boolean('livemode')->default(false);
            $table->string('lookup_key')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
