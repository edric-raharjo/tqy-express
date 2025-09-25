<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $roles = ['admin', 'kurir', 'staff'];

        return [
            'username'     => $this->faker->unique()->userName(),
            'password'     => Hash::make('password123'), // default
            'full_name'    => $this->faker->name(),
            'role'         => $this->faker->randomElement($roles),
            'phone'        => $this->faker->e164PhoneNumber(),
            'email'        => $this->faker->unique()->safeEmail(),
            'date_created' => now(),
        ];
    }
}
