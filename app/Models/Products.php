<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'product_name',
        'kode_produk',
        'harga',
        'description',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
