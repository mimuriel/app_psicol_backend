<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nameA'=>$this->faker->name(),
            'description'=>$this->faker->paragraph,
            'credits'=>$this->faker->numberBetween(1, 5),
            'knowledge_area'=>$this->faker->word,
            'type_of_course'=>$this->faker->randomElement(['electiva', 'obligatoria']),
            'teacher_id'=>$this->faker->numberBetween(1, 3),
            
        ];
    }
}
