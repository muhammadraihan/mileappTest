<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cabang>
 */
class ConnoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'connote_id' => Str::uuid(),
            'connote_number' => '1',
            'connote_service' => 'ECO',
            'connote_service_price' => '50000',
            'connote_amount' => '50000',
            'connote_code' => 'AWB00100209082020',
            'connote_booking_code' => '',
            'connote_order' => '326931',
            'connote_state' => 'PAID',
            'connote_state_id' => '2',
            'zone_code_from' => 'CGKFT',
            'zone_code_to' => 'SMG',
            'surcharge_amount' => null,
            'transaction_id' => Str::uuid(),
            'actual_weight' => '20',
            'volume_weight' => '0',
            'chargeable_weight' => '20',
            'organization_id' => '6',
            'location_id' => Str::uuid(),
            'connote_total_package' => '3',
            'connote_surcharge_amount' => '0',
            'connote_sla_day' => '4',
            'location_name' => 'HUB Medan',
            'location_type' => 'HUB',
            'source_tariff_db' => 'tariff_customers',
            'id_source_tariff' => '1576868',
            'pod' => null
        ];
    }
}
