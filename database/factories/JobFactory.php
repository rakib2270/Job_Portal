<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Web Developer',
            'user_id' => rand(1,5),
            'job_type_id' => rand(1,5),
            'category_id' => rand(1,5),
            'vacancy' => rand(1,5),
            'salary' => rand(11111,99999),
            'location' => fake()->city,
            'application_deadline' => '2024-02-24',
            'description' => fake()->text,
            'benefits' => fake()->text,
            'responsibility' => fake()->text,
            'qualifications' => 'PHP, LARAVEL, MYSQL, OOP',
            'keywords' => 'web develover, graphics designer, php, laravel, mysql',
            'experience' => rand(1,10),
            'company_name' => fake()->name,            
            'company_location' => fake()->address,
            'isFeatured' => 1,
            'company_website' => 'xyz.com',

        ];
    }
}
