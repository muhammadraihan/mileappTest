<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koli_data extends Model
{
    use HasFactory;

    protected $fillable = [
        'koli_length',
        'awb_url',
        'koli_chargeable_weight',
        'koli_width',
        'koli_surcharge',
        'koli_height',
        'koli_description',
        'koli_formula_id',
        'connote_id',
        'koli_volume',
        'koli_weight',
        'koli_id',
        'koli_code'
    ];

    public function koliCustomField(){
        return $this->hasOne(Koli_custom_field::class, 'koli_id', 'koli_id');
    }
}
