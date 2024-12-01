<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Propaganistas\LaravelPhone\PhoneNumber;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $phone = fake()->unique()->e164PhoneNumber();

        return [
            'name' => fake()->firstName,
            'surname' => fake()->lastName,
            'phone' => $phone,
            'email' => fake()->unique()->safeEmail(),
            'country' => (new PhoneNumber($phone))->getCountry(),
        ];
    }
}
