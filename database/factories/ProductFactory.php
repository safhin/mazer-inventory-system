<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(15),
            'supplier' => $this->faker->company(),
            'model' => $this->faker->word(),
            'price' => $this->faker->numberBetween(10000, 30000),
            'category' => $this->faker->sentence(2),
        ];
    }
}
