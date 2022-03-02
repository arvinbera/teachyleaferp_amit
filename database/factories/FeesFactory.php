<?php

namespace Database\Factories;

use App\Models\Fees;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fees::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'session_id' => $this->faker->randomDigitNotNull,
        'class_id' => $this->faker->randomDigitNotNull,
        'student_id' => $this->faker->randomDigitNotNull,
        'fee_category_id' => $this->faker->randomDigitNotNull,
        'date' => $this->faker->word,
        'amount' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
