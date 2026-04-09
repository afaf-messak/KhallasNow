<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
        protected $model = Bill::class;

        public function definition(): array
        {
                $isPaid = $this->faker->boolean(50);
                $paidAt = $isPaid ? $this->faker->dateTimeBetween('-1 year', 'now') : null;

                return [
                        'contract_id' => Contract::factory(),
                        'invoice_number' => 'INV-' . $this->faker->unique()->numerify('######'),
                        'amount' => $this->faker->randomFloat(2, 100, 5000),
                        'due_date' => $this->faker->dateTimeBetween('-30 days', '+90 days'),
                        'is_paid' => $isPaid,
                        'paid_at' => $paidAt,
                        'status' => $isPaid ? 'paid' : 'pending',
                ];
        }
}
