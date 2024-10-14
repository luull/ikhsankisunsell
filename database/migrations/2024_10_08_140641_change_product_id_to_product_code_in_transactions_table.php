<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProductIdToProductCodeInTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Drop the existing product_id column if it exists
            if (Schema::hasColumn('transactions', 'product_id')) {
                $table->dropForeign(['product_id']); // Drop foreign key if exists
                $table->dropColumn('product_id');   // Drop the column
            }
            // Add product_code column
            $table->string('product_code')->after('user_id'); // Adjust position as needed
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
            // Drop the product_code column
            $table->dropColumn('product_code');
            // Re-add product_id column
            $table->unsignedBigInteger('product_id')->nullable()->after('user_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
