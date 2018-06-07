<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, $category = false)
    {
        $product = $product::query();

        // если укаазана категория, то делаем фильтрацию
        if($category){
            $product->where('category_id', $category);
        }

        $products = $product->get();

        return $products;
    }
}
