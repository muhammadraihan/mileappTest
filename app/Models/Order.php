<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 
        'customer_name', 
        'customer_code', 
        'transaction_amount', 
        'transaction_discount',
        'transaction_additional_field',
        'transaction_payment_type',
        'transaction_state',
        'transaction_code',
        'transaction_order',
        'location_id',
        'organization_id',
        'transaction_payment_type_name',
        'transaction_cash_amount',
        'transaction_cash_change',
        'connote_id'
    ];

    public function customerAttribute(){
        return $this->hasOne(Customer_attribute::class, 'transaction_id', 'transaction_id');
    }

    public function connote(){
        return $this->hasOne(Connote::class, 'connote_id','connote_id');
    }

    public function originData(){
        return $this->hasOne(Origin_data::class, 'location_id', 'location_id');
    }

    public function destinationData(){
        return $this->hasOne(Destination_data::class, 'location_id', 'location_id');
    }

    public function koliData(){
        return $this->hasMany(Koli_data::class, 'connote_id', 'connote_id');
    }

    public function customField(){
        return $this->hasOne(Custom_field::class, 'transaction_id', 'transaction_id');
    }

    public function currentLocation(){
        return $this->hasOne(Current_location::class, 'transaction_id', 'transaction_id');
    }
}
