<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function getProducts() {
      $products = Product::all();
      // return view('products')->withCharacters($products);
      return view('products')->with('products', json_decode($products, true));
      // return $products;
  }
}
