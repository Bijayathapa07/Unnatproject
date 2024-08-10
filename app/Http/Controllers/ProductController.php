<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price'=>'numeric|required',
            'stock'=> 'numeric|required',
            'description'=>'required',
            'oldprice'=>'numeric|nullable',
            'photopath'=>'required',
        ]);

        if($request->hasFile('photopath')){
            $image =$request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath,$name);
            $data['photopath'] = $name;

        }

        Product::create($data);
        return redirect(route('product.index'));

        
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories= Category::all();
        return view('product.edit', compact('product','categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product= Product::find($id);
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price'=>'numeric|required',
            'stock'=> 'numeric|required',
            'description'=>'required',
            'oldprice'=>'numeric|nullable',
            'photopath'=>'nullable',
        ]);

        if($request->hasFile('photopath')){
            $image =$request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath,$name);
            File::delete(public_path('images/products/'.$product->photopath));
            $data['photopath'] = $name;

        }

        $product->update($data);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route('product.index'));
    }
}
