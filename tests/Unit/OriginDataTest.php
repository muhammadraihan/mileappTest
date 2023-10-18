<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Origin_data;

uses(TestCase::class);

it('can create', function () {
    Origin_data::factory()->create();
    expect(true)->toBeTrue();
});

it('can update', function () {
    $origin_data = Origin_data::factory()->create();

    $origin_data->customer_name = 'Muhammad Raihan';
    $origin_data->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $origin_data = Origin_data::factory()->create();
    $origin_data->delete();
    expect(true)->toBeTrue();
});
