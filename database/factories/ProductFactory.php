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
            'category_id' => random_int(1,10),
            'name' => $this->faker->unique()->word(),
            'serial-number' => $this->faker->unique()->numberBetween(99999999,999999999),
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'description' =>$this->faker->text(200),
            'photo' => $this->faker->sentence(),
            'payment-method'=> $this->faker->randomElement(['Card', 'Chèque', 'Espèce']),
            'alert-en-stock' => $this->faker->numberBetween(1,200)
        ];
    }
}
