<?php

namespace Database\Factories;

use App\Models\OtherExpenses;
use Illuminate\Database\Eloquent\Factories\Factory;

class OtherExpensesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OtherExpenses::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->word,
        'amount' => $this->faker->randomDigitNotNull,
        'description' => $this->faker->text,
        'image' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
