<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Current_location;
use Illuminate\Support\Str;

uses(TestCase::class);

it('can create', function () {
    Current_location::factory()->create();
    expect(true)->toBeTrue();
});

it('can update', function () {
    $currentLocation = Current_location::factory()->create();

    $currentLocation->code = Str::random(5);
    $currentLocation->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $currentLocation = Current_location::factory()->create();
    $currentLocation->delete();
    expect(true)->toBeTrue();
});
