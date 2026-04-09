<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
        protected $model = Payment::class;

        public function definition(): array
        {
                return [
                        'bill_id' => Bill::factory(),
                        'amount' => $this->faker->randomFloat(2, 10, 3000),
                        'method' => $this->faker->randomElement(['cash', 'bank_transfer', 'credit_card', 'cheque']),
                        'paid_at' => $this->faker->dateTimeBetween('-90 days', 'now'),
                        'note' => $this->faker->optional()->sentence(),
                ];
        }
}
