<?php

namespace Database\Factories;

use App\Models\Marks;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Marks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->randomDigitNotNull,
        'id_no' => $this->faker->randomDigitNotNull,
        'session_id' => $this->faker->randomDigitNotNull,
        'class_id' => $this->faker->randomDigitNotNull,
        'exam_type_id' => $this->faker->randomDigitNotNull,
        'subject_assigning_id' => $this->faker->randomDigitNotNull,
        'marks' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
