<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Price extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'stripe_id',
        'product',
        'active',
        'currency',
        'metadata',
        'nickname',
        'recurring',
        'type',
        'unit_amount',
        'unit_label',
        'billing_scheme',
        'created',
        'currency_options',
        'custom_unit_amount',
        'livemode',
        'lookup_key',
        'transfer_lookup_key',
        'tax_behavior',
        'tiers',
        'tiers_mode',
        'transform_quantity',
        'unit_amount_decimal',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
        'metadata' => 'array',
        'recurring' => 'array',
        'created' => 'timestamp',
        'currency_options' => 'array',
        'custom_unit_amount' => 'array',
        'livemode' => 'boolean',
        'tiers' => 'array',
        'transform_quantity' => 'array',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(Feature::class);
    }

    public function productt(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
