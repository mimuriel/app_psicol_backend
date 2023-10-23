<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document'=>$this->faker-> unique()->numerify('##########'),
            'name'=>$this->faker->name(),
            'phone'=>$this->faker-> unique()->numerify('##########'),
            'email'=>$this->faker->unique()->safeEmail,
            'address'=>$this->faker->address(),
            'city'=>$this->faker->city(),
            'semester'=>rand(1,10),
        ];
    }
}
