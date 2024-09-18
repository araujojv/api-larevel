<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prato>
 */
class PratoFactory extends Factory
{
    protected $model = \App\Models\Prato::class;

    public function definition(): array
    {
        return [
            "nome" =>$this->faker->word,
            "ingredientes"=> $this->faker->sentence,
        ];  
    }
}
