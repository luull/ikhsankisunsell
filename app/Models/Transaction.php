<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'produk', 'provider', 'no_hp', 'amount', 'status', 'payment_reference'];
}
//php artisan serve --port=80,443

