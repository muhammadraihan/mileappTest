<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Koli_data;
use Illuminate\Support\Str;

uses(TestCase::class);

it('can create', function () {
    Koli_data::factory()->create();
    expect(true)->toBeTrue();
});

it('can update', function () {
    $koli_data = Koli_data::factory()->create();

    $koli_data->koli_code = Str::random(10);
    $koli_data->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $koli_data = Koli_data::factory()->create();
    $koli_data->delete();
    expect(true)->toBeTrue();
});
