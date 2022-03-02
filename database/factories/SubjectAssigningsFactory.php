<?php

namespace Database\Factories;

use App\Models\SubjectAssignings;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectAssigningsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubjectAssignings::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_id' => $this->faker->randomDigitNotNull,
        'subject_id' => $this->faker->randomDigitNotNull,
        'full_marks' => $this->faker->randomDigitNotNull,
        'pass_marks' => $this->faker->randomDigitNotNull,
        'obtained_marks' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
