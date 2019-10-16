<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
        @OA\Info(title="Products", version="0.1")
    */
    /**
     * @OA\Get(
     *     path="/api/products",
     *     @OA\Response(response="200", description="List all Products")
     * )
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     @OA\Response(response="200", description="Show one")
     * )
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * @OA\Post (
     *     path="/api/products",
     *     @OA\Response(response="201", description="save a product")
     * )
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }


    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     @OA\Response(response="200", description="Update a Product")
     * )
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json($product, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     @OA\Response(response="204", description="Delete")
     * )
     */
    public function delete(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}