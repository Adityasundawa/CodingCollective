<?php

namespace Database\Factories;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       return [
            'name' => $this->faker->name,
            'education' => $this->faker->text(50),
            'birthday' => $this->faker->date(),
            'experience' => $this->faker->randomDigit,
            'last_position' => $this->faker->text(50),
            'applied_position' => $this->faker->text(50),
            'skills' => $this->faker->text(50),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'resume' => $this->faker->text(50),
        ];
    }
}
