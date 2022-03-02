<?php

namespace Database\Factories;

use App\Models\StudentFeewaive;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFeewaiveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentFeewaive::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_assigning_id' => $this->faker->randomDigitNotNull,
        'fees_category_id' => $this->faker->randomDigitNotNull,
        'discount' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
