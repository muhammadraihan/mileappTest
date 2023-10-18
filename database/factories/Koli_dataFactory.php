<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cabang>
 */
class Koli_dataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'koli_length' => '0',
            'awb_url' => $this->faker->url(),
            'koli_chargeable_weight' => '9',
            'koli_width' => '0',
            'koli_surcharge' => null,
            'koli_height' => '0',
            'koli_description' => 'V WARP',
            'koli_formula_id' => null,
            'connote_id' => Str::uuid(),
            'koli_volume' => '0',
            'koli_weight' => '9',
            'koli_id' => Str::uuid(),
            'koli_code' => Str::random(10)
        ];
    }
}
