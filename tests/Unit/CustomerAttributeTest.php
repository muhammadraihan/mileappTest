<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Customer_attribute;

uses(TestCase::class);

it('can create', function () {
    Customer_attribute::factory()->create();
    expect(true)->toBeTrue();
});

it('can update', function () {
    $customer_attribute = Customer_attribute::factory()->create();

    $customer_attribute->top = '7 Hari';
    $customer_attribute->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $customer_attribute = Customer_attribute::factory()->create();
    $customer_attribute->delete();
    expect(true)->toBeTrue();
});
