<?php

namespace Database\Factories;

use App\Models\Category;
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
            'category_id' => $this->faker->numberBetween(1,4),
            'name' => $this->faker->unique()->word(),
            'serial_number' => $this->faker->unique()->numberBetween(999999,9999999),
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'photo' => $this->faker->image(storage_path('images'),640,480,false),
            'payment_method'=> $this->faker->randomElement(['Card', 'Chèque', 'Espèce']),
            'alert_en_stock' => $this->faker->numberBetween(1,200)
        ];
    }
}
