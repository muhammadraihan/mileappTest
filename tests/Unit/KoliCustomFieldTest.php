<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Koli_custom_field;
use Illuminate\Support\Str;

uses(TestCase::class);

it('can create', function () {
    Koli_custom_field::factory()->create();
    expect(true)->toBeTrue();
});

it('can update', function () {
    $koli_custom_field = Koli_custom_field::factory()->create();

    $koli_custom_field->koli_id = Str::uuid();
    $koli_custom_field->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $koli_custom_field = Koli_custom_field::factory()->create();
    $koli_custom_field->delete();
    expect(true)->toBeTrue();
});
