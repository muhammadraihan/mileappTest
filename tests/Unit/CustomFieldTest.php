<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Custom_field;
use Illuminate\Support\Str;

uses(TestCase::class);

it('can create', function () {
    Custom_field::factory()->create();
    expect(true)->toBeTrue();
});

it('can update', function () {
    $customField = Custom_field::factory()->create();

    $customField->catatan_tambahan = 'Barang Mudah Pecah !!';
    $customField->save();
    expect(true)->toBeTrue();
});

it('can delete', function(){
    $customField = Custom_field::factory()->create();
    $customField->delete();
    expect(true)->toBeTrue();
});
