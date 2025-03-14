<?php

namespace Rayiumir\LaravelMetabox\Database\factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MetaboxFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model_type' => 'App\Models\Post',
            'model_id' => Post::factory(),
            'key' => $this->faker->word,
            'value' => $this->faker->sentence,
        ];
    }
}
