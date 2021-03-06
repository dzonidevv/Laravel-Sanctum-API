<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return ProductCollection::collection(Product::paginate(4));
        // return Product::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([

            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',

        ]);

        // return Product::create([
        //     'name' => 'Product One',
        //     'slug' => 'product-one',
        //     'description' => 'This is product one',
        //     'price' => '99.99',
        // ]);

        return Product::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $id)
    {
        
        return new ProductResource($id);
        // return Product::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return $product;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // Može i ovako
        // return Product::destroy($id);

        $product = Product::findOrFail($id);

        $product->delete();

        return $product;

    }


    /**
     * Search for a name.
     *
     * @param  str $iname
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {

        return Product::where('name', 'like', '%' . $name . '%')->get();

    }


}
