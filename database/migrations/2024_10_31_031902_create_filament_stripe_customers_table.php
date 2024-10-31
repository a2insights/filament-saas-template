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
        Schema::create(config('filament-stripe.table_names.customers'), function (Blueprint $table) {
            $table->id();
            $table->morphs('billable');
            $table->string('stripe_id')->nullable();
            $table->json('address')->nullable();
            $table->integer('balance')->nullable();
            $table->json('cash_balance')->nullable();
            $table->bigInteger('created')->nullable();
            $table->string('currency')->nullable();
            $table->string('default_source')->nullable();
            $table->boolean('delinquent')->default(false);
            $table->string('description')->nullable();
            $table->json('discount')->nullable();
            $table->string('email')->nullable();
            $table->string('invoice_prefix')->nullable();
            $table->json('invoice_settings')->nullable();
            $table->boolean('livemode')->default(false);
            $table->json('metadata')->nullable();
            $table->string('name')->nullable();
            $table->integer('next_invoice_sequence')->nullable();
            $table->string('phone')->nullable();
            $table->json('preferred_locales')->nullable();
            $table->json('shipping')->nullable();
            $table->json('tax')->nullable();
            $table->string('tax_exempt')->nullable();
            $table->string('test_clock')->nullable();
            $table->string('coupon')->nullable();
            $table->string('promotion_code')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
