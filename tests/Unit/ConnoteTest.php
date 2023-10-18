<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Connote;

uses(TestCase::class);

it('can create', function () {
    Connote::factory()->create();
    expect(true)->toBeTrue();
});

it('can update', function () {
    $connote = Connote::factory()->create();

    $connote->connote_service_price = '10000000';
    $connote->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $connote = Connote::factory()->create();
    $connote->delete();
    expect(true)->toBeTrue();
});
