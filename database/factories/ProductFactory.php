<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'stripe_id' => $this->faker->word(),
            'name' => $this->faker->name(),
            'active' => $this->faker->boolean(),
            'description' => $this->faker->text(),
            'metadata' => '{}',
            'default_price_data' => '{}',
            'images' => '{}',
            'marketing_features' => '{}',
            'package_dimensions' => '{}',
            'shippable' => $this->faker->boolean(),
            'statement_descriptor' => $this->faker->word(),
            'tax_code' => $this->faker->word(),
            'unit_label' => $this->faker->word(),
            'url' => $this->faker->url(),
        ];
    }
}