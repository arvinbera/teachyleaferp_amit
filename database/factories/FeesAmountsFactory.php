<?php

namespace Database\Factories;

use App\Models\FeesAmounts;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeesAmountsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeesAmounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fees_category_id' => $this->faker->randomDigitNotNull,
        'class_id' => $this->faker->randomDigitNotNull,
        'amount' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
