<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'nama_sales',
        'top',
        'jenis_pelanggan'
    ];

    public function transaksi(){
        return $this->hasOne(Order::class, 'transaction_id', 'transaction_id');
    }
}
