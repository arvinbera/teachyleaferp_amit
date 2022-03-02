<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'email' => $this->faker->word,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => $this->faker->word,
        'user_type' => $this->faker->word,
        'role' => $this->faker->word,
        'phone' => $this->faker->word,
        'father_name' => $this->faker->word,
        'father_phone' => $this->faker->word,
        'mother_name' => $this->faker->word,
        'address_current' => $this->faker->word,
        'address_permanent' => $this->faker->word,
        'religion' => $this->faker->word,
        'dob' => $this->faker->word,
        'id_no' => $this->faker->word,
        'joining_date' => $this->faker->word,
        'generated_password' => $this->faker->word,
        'designation_id' => $this->faker->randomDigitNotNull,
        'salary' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'remember_token' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
