<?php

namespace Database\Factories;

use App\Models\EmployeeAttendances;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeAttendancesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeAttendances::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->randomDigitNotNull,
        'date' => $this->faker->word,
        'attendance_status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
