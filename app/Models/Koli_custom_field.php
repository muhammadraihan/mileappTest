<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koli_custom_field extends Model
{
    use HasFactory;

    protected $fillable = [
        'koli_id','awb_sicepat', 'harga_barang'
    ];
}
