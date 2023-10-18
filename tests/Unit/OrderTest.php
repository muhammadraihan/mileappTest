<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order;

uses(TestCase::class);

it('can create order', function () {
    Order::create([
        'transaction_id' =>  Str::uuid(),
        'customer_name' =>  'Muhammad Raihan',
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
    ]);
    expect(true)->toBeTrue();
});

it('can update order', function () {
    $order = Order::create([
        'transaction_id' =>  Str::uuid(),
        'customer_name' =>  'Muhammad Raihan',
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
    ]);

    $order->transaction_amount = 50000;
    $order->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $order = Order::factory()->create();
    $order->delete();
    expect(true)->toBeTrue();
});
