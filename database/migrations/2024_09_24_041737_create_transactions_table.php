<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('user_id');
        $table->string('produk'); // pulsa, data, etc.
        $table->string('provider'); // telkomsel, XL, indosat
        $table->string('no_hp');
        $table->integer('amount'); // nominal pembelian
        $table->string('status')->default('pending'); // pending, paid, completed
        $table->string('payment_reference')->nullable(); // nomor bukti transfer
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
