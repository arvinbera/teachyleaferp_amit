<?php

namespace Database\Factories;

use App\Models\SalaryLogs;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryLogsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalaryLogs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->randomDigitNotNull,
        'previous_salary' => $this->faker->randomDigitNotNull,
        'present_salary' => $this->faker->randomDigitNotNull,
        'increment' => $this->faker->randomDigitNotNull,
        'effective_from' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
