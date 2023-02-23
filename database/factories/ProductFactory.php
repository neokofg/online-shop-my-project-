<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = rand(10000,100000);
        return [
            'type_id' => rand(1,2),
            'name' => fake()->name(),
            'image' => '[{"name":"202302231538afBkQPgng6H5GqKpAmYSFDmPYxof3FGPQV1RCIE7.jpg"},{"name":"202302231538kMa7AT3f9jxLwdKGoAcebegH1Ovl6c8vW2m0qWZh.jpg"},{"name":"202302231538RWTdUIxXD1VX4ggbw8FAOGnHMAnQZzhIoI35LM2Q.jpg"}]',
            'description' => fake()->paragraph(),
            'price' => $price,
            'sale' => $price,
            'available' => rand(10,100),
            'chars' => '{"asd":"23","asd1":"45","asd3":"32"}',
        ];
    }
}
