<?php
namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function showProduct()
    {
        $products = Products::all();
        return view('home.product', compact('products'));
    }
}