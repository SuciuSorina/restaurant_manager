<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderPart;
use App\Product;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function __construct( Order $order, OrderPart $orderPart)
    {
        $this->order = $order;
        $this->orderPart = $orderPart;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    
    public function addOrderParts(Request $request) {
        
        $inputs = $request->all();
       
        $loggedUserId = Auth::user()->id;


        $checkIfOrderExist = Order::where("user_id", $loggedUserId)->where("status","DRAFT")->exists();
        $orderPartData = [];

        if (!$checkIfOrderExist) {

            $params["user_id"] = $loggedUserId;
            $product = Product::find($inputs['product_id']);
          
            $order = $this->order->create($params);

            $orderPartData['order_id']      = $order->id;
            $orderPartData['product_id']    = $inputs['product_id'];
            $orderPartData['quantity']      = $inputs['quantity'];
            $orderPartData['price']         = $inputs['quantity'] * $product->price;
            
            $orderPart = $this->orderPart->create($orderPartData);
        } else {
            $order = Order::where("user_id",$loggedUserId)->where("status","DRAFT")->orderBy("created_at", "desc")->first();
          
           $product = Product::find($inputs['product_id']);
           $orderPartData['order_id']      = $order->id;
           $orderPartData['product_id']    = $inputs['product_id'];
           $orderPartData['quantity']      = $inputs['quantity'];
           $orderPartData['price']         = $inputs['quantity'] * $product->price;
           
           $orderPart = $this->orderPart->create($orderPartData);
        }
        
        return redirect()->route('products.index');
    }

    public function getOrderParts() {
        $loggedUserId = Auth::user()->id;
        $order = Order::where("user_id", $loggedUserId)
                        ->where("status","DRAFT")
                        ->orderBy('created_at', 'desc')
                        ->with('orderParts.product')
                        ->first();
        
        return view('orders/order')->withOrder($order);
    }
}
