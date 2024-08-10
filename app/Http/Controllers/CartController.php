<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use App\Models\Category;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /* public function index()
    {
        
        $categories = Category::orderBy('priority')->get();
        $carts = Cart::where('user_id',auth()->user()->id)->get();
        return view('viewcart',compact('carts','categories'));
    } */


    public function index()
    {
        if(!auth()->user())
        {
            $itemsincart = 0;
        }
        else
        {
            $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
        $categories = Category::orderBy('priority')->get();
        $carts = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->get();
        $totalamount = 0;
        foreach($carts as $cart)
        {
            $total = $cart->qty * $cart->product->price;
            $cart->subtotal = $total;
            $totalamount += $total;
        }
        return view('viewcart',compact('carts','categories','itemsincart'));
    }


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'qty' => 'required',
            'product_id' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        //check if already exist
        $check = Cart::where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->where('is_ordered',false)->count();
        if($check > 0)
        {
            return back()->with('success','Item already in Cart');
        }

        Cart::create($data);
        return back()->with('success','Item added to Cart');
    }



    public function checkout()
    {
        if(!auth()->user()){
            $itemsincart = 0;
        }
        else
       {
        $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();

       }
       $categories = Category::orderBy('priority')->get();
       return view('checkout',compact('categories','itemsincart'));
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
 
        $cart = Cart::find($id);
        $data = $request->validate([
            'qty' => 'required',
        ]);
       $cart->update($data);

        return back()->with('success', 'Cart item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destory(Cart $cart){
        $cart->delete();
        return Redirect(route('cart.index'))->with('success','Item Deleted Sucessfully!');
        }


    /**
     * Remove the specified resource from storage.
     */
    
}
