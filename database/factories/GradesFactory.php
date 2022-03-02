<?php

namespace Database\Factories;

use App\Models\Grades;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grades::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grade_name' => $this->faker->word,
        'grade_point' => $this->faker->word,
        'start_marks' => $this->faker->word,
        'end_marks' => $this->faker->word,
        'start_point' => $this->faker->word,
        'end_point' => $this->faker->word,
        'remarks' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
