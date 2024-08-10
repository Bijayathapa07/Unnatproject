<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;
use App\Models\cart;
use App\Models\Gallery;
use App\Models\order;

class PagesController extends Controller
{

    public function include()
    {
        if(!auth()->user())
        {
            return 0;
        }
        else
        {
            return Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
    }





    public function home()
    {   
        $itemsincart = $this->include();
        $categories= Category::all();
        $products =  Product::all();
        return view('welcome',compact('categories','products','itemsincart'));
    }


    public function gallery()
    {   
        $itemsincart = $this->include();
        $categories= Category::all();
        $galleries =  Gallery::all();
        return view('viewgallery',compact('categories','galleries','itemsincart'));
    }


    public function homes()
    {   
        $itemsincart = $this->include();
        $categories= Category::all();
        $products =  Product::all();
        return view('home',compact('categories','products','itemsincart'));
    }


    public function contact()
    {
        $itemsincart= $this->include();
    
        $categories = Category::orderBy('priority')->get();

        
        //$products = Product::where('category_id', $product->category_id)::paginate(4);
        return view('contact',compact('categories','itemsincart'));
        
    }


    public function viewproduct(Product $product)
    {
        $itemsincart = $this->include();
        $categories= Category::orderBy('priority')->get();
        $relatedproducts = Product::where('category_id',$product->category_id)->whereNot('id',$product->id)->get();
        return view('viewproduct',compact('categories','product','itemsincart','relatedproducts'));

    }


    public function categoryproduct($id)
    {
        $category = Category::find($id);
        $itemsincart = $this->include();
        $products = Product::where('category_id',$id)->paginate(4);
        $categories = Category::orderBy('priority')->get();
        return view('categoryproduct',compact('products','categories','itemsincart','category'));
    }





    public function userlogin()
    {
        $categories = Category::orderBy('priority')->get();
        return view('userlogin',compact('categories'));
    }


    public function userregister()
    {
        // $id = auth()->user()->id;
        // $itemsincart = Cart::where('user_id',$id)->where('is_ordered',false)->count();
        $categories = Category::orderBy('priority')->get();
        return view('userregister',compact('categories'));
    }

    

    public function userstore(Request $request)
    {
       
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photopath' => 'nullable',
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';

        if ($request->hasFile('photopath')) {
            $image = $request->file('photopath');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $image->move($destinationPath, $name);

            //return response($name, 200);
            $data['photopath'] = $name;
        }

        //return response([$data], 200);



        User::create($data);
        //return response($request -> all());
        return redirect(route('homes'));
    }



    public function orders()
    {
        $categories = Category::orderBy('priority')->get();
        $itemsincart = $this->include();
        $orders = order::where('user_id',auth()->user()->id)->get();
        foreach($orders as $order)
        {
            $cartids = explode(',',$order->cart_id);
            $carts = [];
            foreach($cartids as $cartid)
            {
                $cart = Cart::find($cartid);
                array_push($carts,$cart);
            }
            $order->carts = $carts;
        }

        return view('orderlist',compact('orders','categories','itemsincart'));
    }




   
}
