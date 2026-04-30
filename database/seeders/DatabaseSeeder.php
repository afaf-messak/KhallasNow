<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@khallasnow.test'],
            [
                'name' => 'KhallasNow Admin',
                'password' => Hash::make('password'),
            ]
        );

        User::factory()->count(12)->create();

        Contract::factory()
            ->count(5)
            ->create()
            ->each(function (Contract $contract) {
                Bill::factory()
                    ->for($contract)
                    ->count(3)
                    ->create()
                    ->each(function (Bill $bill) {
                        Payment::factory()
                            ->for($bill)
                            ->count(2)
                            ->create();
                    });
            });
    }
}
