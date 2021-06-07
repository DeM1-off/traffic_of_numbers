<?php

namespace Database\Factories;

use App\Models\Telephone;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TelephoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Telephone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {



        $operator = [50,67,63,68];
        $randOperator = rand(0,3);
        $countryNumber = 380 .$operator[$randOperator].rand(1000000,9999999);

            return [
                'number' => $countryNumber,
                'balance' => $this->faker->numberBetween(-50, 150),
                'user_id' =>   User::factory()->create()->id
            ];



}


}
