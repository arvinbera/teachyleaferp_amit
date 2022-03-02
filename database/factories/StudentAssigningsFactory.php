<?php

namespace Database\Factories;

use App\Models\StudentAssignings;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentAssigningsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentAssignings::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->word,
        'session_id' => $this->faker->word,
        'shift_id' => $this->faker->word,
        'class_id' => $this->faker->word,
        'section_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
