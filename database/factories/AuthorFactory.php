<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /** @var string $name
         * @var string $first_name
         */
        $first_name = $this->faker->firstName();
        $name = $this->faker->lastName();
        return [
            'first_name' => ucwords($first_name),
            'name' => ucwords($name)
        ];
    }


}
