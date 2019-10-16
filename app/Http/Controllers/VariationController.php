<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variation;

class VariationController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/products/{id}/variations",
     *     @OA\Response(response="200", description="List All Variations")
     * )
     */
    public function index(int $id, $description)
    {
        return Variation::where('product_id', $id);
    }
	
    /**
     * @OA\Post(
     *     path="/api/products/{id}/variations",
     *     @OA\Response(response="201", description="Save")
     * )
     */
    public function store(int $id, Request $request)
    {	
		$variation = new Variation($request->all());
		$variation->product_id  = $id;
		//$variation->description = $request->all()['description'];
		echo 'save: '.$variation->save();
        return response()->json($variation, 201);
    }
    
    /**
     * @OA\Put(
     *     path="/api/products/{id}/variations",
     *     @OA\Response(response="200", description="Update")
     * )
     */
    public function update(Request $request, Variation $variation)
    {
        $variation->update($request->all());
        return response()->json($variation, 200);
    }
	
    /**
     * @OA\Delete(
     *     path="/api/products/{id}/variations",
     *     @OA\Response(response="204", description="Delete")
     * )
     */
    public function delete(Variation $variation)
    {
        $variation->delete();
        return response()->json(null, 204);
    }
}