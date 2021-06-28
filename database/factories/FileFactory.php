<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'mime_type' => $this->faker->mimeType(),
            'url' => $this->faker->url(),
            'fileable_id' => Product::factory()->create(),
            'fileable_type' => Product::class,
        ];
    }
}
