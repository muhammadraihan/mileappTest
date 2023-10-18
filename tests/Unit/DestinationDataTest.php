<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Destination_data;

uses(TestCase::class);

it('can create', function () {
    Destination_data::factory()->create();
    expect(true)->toBeTrue();
});

it('can update', function () {
    $destination_data = Destination_data::factory()->create();

    $destination_data->customer_name = 'Muhammad Raihan';
    $destination_data->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $destination_data = Destination_data::factory()->create();
    $destination_data->delete();
    expect(true)->toBeTrue();
});
