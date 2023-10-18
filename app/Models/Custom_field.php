<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custom_field extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id', 'catatan_tambahan' 
    ];
}
