<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "Nome" => fake()->name(),
            "Cpf" => fake()->unique()->numerify("###########"),
            "DataNascimento" => Carbon::today()->subYears(rand(0, 80))->subMonths(rand(0, 12))->subDays(0, 365),
            "Renda" => rand(0, 3500),
            "DataCadastro" => Carbon::now()->subDays(rand(0, 8))
        ];
    }
}
