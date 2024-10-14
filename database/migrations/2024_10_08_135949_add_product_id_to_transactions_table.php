<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Add product_id column as a foreign key
            $table->unsignedBigInteger('product_id')->nullable()->after('user_id');
            
            // Set the foreign key constraint to the products table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the foreign key and column
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
}
