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

        if ($request->has('from_place_order')) {

            // if($inputs['hour'] == false) {
            //     return back();
            // }
            $order = Order::where("user_id", $loggedUserId)
                        ->where("status","DRAFT")
                        ->orderBy('created_at', 'desc')
                        ->first();

            $order->status = "NEW";
            $order->delivery_type = $inputs["delivery_type"];
            $order->hour = $inputs["hour"];
                
            $order->update();

            return view("orders.orderPlaced");

        }

        $checkIfOrderExist = Order::where("user_id", $loggedUserId)->where("status","DRAFT")->exists();
        $orderPartData = [];

        if (!$checkIfOrderExist) {

            $params["user_id"] = $loggedUserId;
            $product = Product::find($inputs['product_id']);
          
            $order = $this->order->create($params);

            $orderPartData['order_id']          = $order->id;
            $orderPartData['product_name']      = $product->name;
            $orderPartData['product_price']     = $product->price;
            $orderPartData['quantity']          = $inputs['quantity'];
            $orderPartData['price']             = $inputs['quantity'] * $product->price;
            
            $orderPart = $this->orderPart->create($orderPartData);
        } else {
           $order = Order::where("user_id",$loggedUserId)->where("status","DRAFT")->orderBy("created_at", "desc")->first();
          
           $product = Product::find($inputs['product_id']);
           $orderPartData['order_id']          = $order->id;
           $orderPartData['product_name']      = $product->name;
           $orderPartData['product_price']     = $product->price;
           $orderPartData['quantity']          = $inputs['quantity'];
           $orderPartData['price']             = $inputs['quantity'] * $product->price;
           
           $orderPart = $this->orderPart->create($orderPartData);
        }
        
        return redirect()->route('products.index');
    }

    public function getOrderParts() {
        $loggedUserId = Auth::user()->id;
        $order = Order::where("user_id", $loggedUserId)
                        ->where("status","DRAFT")
                        ->orderBy('created_at', 'desc')
                        ->with('orderParts')
                        ->first();
        $hours = [  '10:15', '10:30', '10:45', '11:00',
                    '11:15', '11:30', '11:45', '12:00',
                    '12:15', '12:30', '12:45', '13:00',
                    '13:15', '13:30', '13:45', '14:00',
                    '14:15', '14:30', '14:45', '15:00',
                    '15:15', '15:30', '15:45', '16:00',
                    '16:15', '16:30', '16:45', '17:00',
                    '17:15', '17:30', '17:45', '18:00',
                    '18:15', '18:30', '18:45', '19:00',
                    '19:15', '19:30', '19:45', '20:00',
                    '20:15', '20:30', '20:45', '20:00',
                    '21:15', '21:30', '21:45', '21:00',
                    '22:15', '22:30', '22:45', '22:00',
                    
                ];

        if($order == null) {
            return back()->with('fail', 'Please add product in cart!');
        }
        return view('orders/order')->withOrder($order)
                                    ->withHours($hours);
    }
}
