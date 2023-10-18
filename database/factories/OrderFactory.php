<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cabang>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' =>  Str::uuid(),
            'customer_name' =>  $this->faker->name(),
            'customer_code' =>  '1289',
            'transaction_amount' =>  '12000',
            'transaction_discount' => '12000',
            'transaction_additional_field' => '',
            'transaction_payment_type' => '29',
            'transaction_state' => 'PAID',
            'transaction_code' => Str::random(20),
            'transaction_order' => '121',
            'location_id' => Str::uuid(),
            'organization_id' => '6',
            'transaction_payment_type_name' => 'Invoice',
            'transaction_cash_amount' => '0',
            'transaction_cash_change' => '0',
            'connote_id' => Str::uuid()
        ];
    }
}
