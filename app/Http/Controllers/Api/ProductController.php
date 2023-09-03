<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerFactory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    
    public function store(Request $request)
    {
        return ControllerFactory::createOne(Product::class)($request);
    }
}
