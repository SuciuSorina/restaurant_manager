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
        
        $orders = $this->order->with('user')->where('status', '!=', 'DRAFT')->get();
        return view('orders.listing')->withOrders($orders);
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
        
        return redirect()->route('categories.index');
    }

    public function getOrderParts() {

        $loggedUserId = Auth::user()->id;
        $total = 0;
        $order = Order::where("user_id", $loggedUserId)
                        ->where("status","DRAFT")
                        ->orderBy('created_at', 'desc')
                        ->with('orderParts')
                        ->first();

        $hours = $this->order->getHours();

        $goodHours = [];
        $currentHour = date('H:i', strtotime('+3 hour')); // preia ora Romaniei +2 GMT

        foreach($hours as $hour) {
            if($hour > $currentHour) {
                $goodHours[] = $hour;
            }
        }

        if($order == null) {
            return view('orders/order');
        }

        if(count($order->orderParts)) {
            foreach($order->orderParts as $part) {
                $total = $total + $part->price;
            }
        }

        return view('orders/order')->withOrder($order)
                                    ->withGoodHours($goodHours)
                                    ->withTotal($total);
    }

    public function updateOrderStatus(Request $request) {

        $inputs = $request->all();
       
      

        if ($inputs['status'] == "NEW") {
            $loggedUserId = Auth::user()->id;
            $order = Order::where("user_id", $loggedUserId)
                    ->where("status","DRAFT")
                    ->orderBy('created_at', 'desc')
                    ->first();
            
            $currentHour = date('H:i', strtotime('+3 hour'));

            if ($inputs["hour"] < $currentHour) {
                return "fail";
            }

            $order->status = $inputs['status'];
            $order->delivery_type = $inputs["delivery_type"];
            $order->hour = $inputs["hour"];
            $order->total = $inputs["total"];
            $order->update();

            return view("orders.orderPlaced");
        } 

        if (in_array($inputs['status'], ["PROCESSING", "DELIVERED", "CANCELED"])) {
            // update order status
            // dd($inputs);
            $order = Order::find($inputs['order_id']);
            $order->status = $inputs['status'];
            $order->update();
            return redirect()->route('orders.index');
        }

    }

    public function removeOrderParts(Request $request) {
        $inputs = $request->all();

        $orderPart = OrderPart::find($inputs['part_id']);
        
        $orderPart->delete();
        return redirect()->route('cart');
    }

    public function showOrder($id) {

        $order = Order::where('id', $id)->with('orderParts')->first();
        return view('orders.show')->withOrder($order);
    }
}
