<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.j
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Gera um valor booleano aleatório para o campo 'paid'.
        $paid = $this->faker->boolean();

        // Retorna um array associativo com os dados fictícios do modelo `Invoice`.
        return [
            // Preenche 'user_id' com o ID de um usuário aleatório existente no banco de dados.
            'user_id' => User::all()->random()->id,

            // Preenche 'type' com um elemento aleatório ('a', 'b' ou 'c').
            'type' => $this->faker->randomElement(['a', 'b', 'c']),

            // Preenche 'paid' com o valor aleatório gerado anteriormente.
            'paid' => $paid,

            // Preenche 'value' com um número aleatório entre 1000 e 10000.
            'value' => $this->faker->numberBetween(1000, 10000),

            // Preenche 'payment_date' com uma data aleatória deste mês se 'paid' for verdadeiro,
            // caso contrário, define como null.
            'payment_date' => $paid ? $this->faker->randomElement([$this->faker->datetimeThisMonth()]) : null
        ];
    }
}
