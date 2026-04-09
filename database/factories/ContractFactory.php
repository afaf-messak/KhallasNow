<?php

namespace Database\Factories;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
        protected $model = Contract::class;

        public function definition(): array
        {
                $start = $this->faker->dateTimeBetween('-2 years', 'now');
                $end = (clone $start)->modify('+1 year');

                return [
                        'contract_number' => 'CT-' . $this->faker->unique()->numerify('######'),
                        'title' => $this->faker->company(),
                        'start_date' => $start,
                        'end_date' => $end,
                        'total_amount' => $this->faker->randomFloat(2, 500, 10000),
                        'status' => $this->faker->randomElement(['active', 'pending', 'completed', 'cancelled']),
                ];
        }
}
