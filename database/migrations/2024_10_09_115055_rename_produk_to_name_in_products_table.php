<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProdukToNameInProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('produk', 'product_name');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('product_name', 'produk');
        });
    }
}
