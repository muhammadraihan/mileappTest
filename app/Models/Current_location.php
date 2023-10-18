<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Current_location extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'name',
        'code',
        'type'
    ];
}
