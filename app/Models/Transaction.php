<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ref_id',
        'product_code', 
        'produk',
        'provider',
        'no_hp',
        'amount',
        'status',
        'payment_reference',
        'transfer_proof',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_code', 'kode_produk');
    }
}
