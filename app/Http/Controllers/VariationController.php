<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variation;

class VariationController extends Controller
{
    public function index($description)
    {
		#add search
		#add product relationship
		#add tests
        return Variation::all();
    }
	
    public function show(Variation $variation)
    {
        return $variation;
    }
	
    public function store(int $id, Request $request)
    {	
		$variation = new Variation($request->all());
		$variation->product_id  = $id;
		//$variation->description = $request->all()['description'];
		echo 'save: '.$variation->save();
        return response()->json($variation, 201);
    }
	
    public function update(Request $request, Variation $variation)
    {
        $variation->update($request->all());
        return response()->json($variation, 200);
    }
	
    public function delete(Variation $variation)
    {
        $variation->delete();
        return response()->json(null, 204);
    }
}