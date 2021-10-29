<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /** @var string $title */
        $title = $this->faker->words(4, true);
        return [
            'title' => ucwords($title),
            'short_description' => $this->faker->text(100),
            'description' => $this->faker->text(600),
            'category_id' => $this->faker->numberBetween(1, 10),
            'author_id' => $this->faker->numberBetween(1, 10),
        ];
    }


}
