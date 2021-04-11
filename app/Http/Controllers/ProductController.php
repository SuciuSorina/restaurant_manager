<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use App\OrderPart;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::getAll();

        return view('products/listing')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('products/create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|unique:products',
            'price' => 'required',
            'image' => 'required',
            'description'   => 'required',
        ]);
        $inputs = $request->all();

        $product = new Product();
        $product->name = $inputs['name'];
        $product->price = $inputs['price'];
        $product->category_id = $inputs['category_id'];
        $product->description = $inputs['description'];

        if($inputs['image']) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $product->name. '-' . time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::with("category")->find($id);
        $categories = Category::get();

        return view('products/edit')->withProduct($product)
                                    ->withCategories($categories);
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
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description'   => 'required',
        ]);

        $inputs= $request->all();
        
        $checkIfExist= Product::where('id','!=', $id)->where('name',$inputs['name'])->exists();

        if ($checkIfExist) {
            return back()->with("productExists", "Your product name already exists.");
        }

        $product = Product::find($id);
        $product->name = $inputs['name'];
        $product->price = $inputs['price'];
        $product->category_id = $inputs['category_id'];
        $product->description = $inputs['description'];

        if(isset($inputs['image']) && $inputs['image']) {
            $image_path = public_path("/uploads/products/". $product->image);
            
            if(\File::exists($image_path)) {
                \File::delete($image_path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $product->name. '-' . time() . '.' . $extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;

        }

        
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // $loggedUserId = Auth::user()->id;

        // $order = Order::where('user_id', $loggedUserId)->where('status', 'DRAFT')->orderBy('created_at', 'desc')->pluck('id')->toArray();

        // if (count($order)) {
            
        //     $checkIfExistOrderParts = OrderPart::whereIn('order_id', $order)->where('product_id', $id)->exists();
            
        //     if ($checkIfExistOrderParts) {
        //         return back()->with('orderPartExist', 'This product is in some procesed orders');
        //     }

        // }

        $product->delete();
        
        return redirect('/products')->with('success', 'Product deleted!');
    }
}
