<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'nis' => $this->faker->unique()->numerify('######'), // 6-digit unique NIS
            'birthdate' => $this->faker->date,
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'class' => $this->faker->randomElement(['A', 'B', 'C']),
            'school_year' => $this->faker->year,
            'registration_date' => $this->faker->date,
            'profile_photo' => null, // You can handle photo upload separately
            'notes' => $this->faker->paragraph,
        ];
    }
}
