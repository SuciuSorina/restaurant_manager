@extends('app')
@section('content')


    <div style="display: flex; justify-content: center;">
        <div class="col-md-2"></div>
        <div class="card col-md-8 text-center">
            <h1 style="font-size: xx-large; font-weight: inherit;" class="mb-3 pt-3"s>Order Details</h1>

                <div class="form-group">
                    
                </div>
                <div class="form-group">
                    <label>Delivery method : {{$order->delivery_type}} </label> </br>
                    <label>Status: {{ $order->status}}</label></br>
                    <label >Delivery Hour: {{$order->hour}} </label></br>
                </div>
                <div class="form-group">
                    <table class="table table-bordered">
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Part Price</th>
                    
                        @foreach($order->orderParts as $part)
                        <tr>
                            <td>{{$part->product_name}}</td>
                            <td>{{$part->quantity}}</td>
                            <td>{{$part->product_price}}</td>
                            <td>{{$part->price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                                Total Price: {{$order->total}} RON
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                   
                    <a href="" style="color:white;" type="button" class="btn btn-warning">Back </a>
                </div>
        </div>
    <div class="col-md-2"></div>

@endsection